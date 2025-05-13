<?php

namespace App\Http\Controllers\admissions;

use App\Models\admission;
use App\Traits\WebResponse;
use Illuminate\Http\Request;
use App\Events\StudentReject;
use App\Events\StudentApproved;
use App\Http\Controllers\Controller;
use App\Http\Resources\admissionResource;
use App\Http\Resources\Applying_admissionResource;
use App\Models\Applying_for_university_admission ;

class admission_Management extends Controller // كل الشروط لهذه التوابع داخل middlewere
{
use WebResponse;
// يوجد midellwere للتحقق من وجود المفاضلة التي اريد  admission managment meddlewere
public function approve_admission(request $request){

$admission=$request->get('admission');
 $admission->update(['status'=>'approved']);

return response()->json(['message' => 'Admission approved successfully'], 200);

}


public function need_update(request $request){        // بقي لدي ارسال ايميل لاخباره ان 
                                                     // المفاضلة تحتاج الى تعديل
   
    $admission=$request->get('admission');
 $admission->update(['status'=>'need_update']);

return response()->json(['message' => 'You must modify the admission request.'], 200);
}


// middlewere خاص بتوابع العرض display admission
public function display_unapproved(request $request){
   
$admission=Applying_for_university_admission::whereIn('status',['need_update','updated','new'])->get();
return $admission;
}


public function display_approved(request $request){
    
$admission=Applying_for_university_admission::where('status','approved')->get();
return $this->response(Applying_admissionResource::collection($admission), 'Best wishes', 200);
}




public function admission_result($id){

$user=auth()->user();
if (!$user || !$user->hasRole('employee')) {
   return response()->json(['message' => 'Unauthorized'], 403);
        }

$application = Applying_for_university_admission::find($id); 
if (!$application || $application->status !== 'approved') {
    return response()->json(['message' => 'لا يمكن عرض النتيجة قبل الموافقة على الطلب'], 403);
}
$studentScore = $application->score;
$user_id=$application->user_id;


$desires = [
    $application->first_desir_code,
    $application->Second_desir_code,
    $application->third_desir_code,
    $application->fourth_desir_code,
    $application->fifth_desir_code,
    $application->sixth_desir_code,
];
$acceptedDesire = null;

foreach ($desires as $desireCode) {
    if (!$desireCode) continue; // تجاوز القيم الفارغة

    $admission = admission::where('desire_code', $desireCode)
        ->where('scor', '<=', $studentScore)
        ->first();

    if ($admission) {
        $acceptedDesire = $admission;
        break; // توقف عند أول رغبة تنطبق
    }
}
if ($acceptedDesire) {
    event(new StudentApproved($user_id));

   return response()->json([
       'accepted_desire_code' => $acceptedDesire->desire_code,
       'required_score' => $acceptedDesire->scor,
   ]);


}
 else {
    event(new StudentReject($user_id));

   return response()->json([
       'status' => 'rejected',
       'message' => 'No desire matched the required score',
   ]);
    

}




}











}
