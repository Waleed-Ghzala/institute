<?php

namespace App\Http\Controllers\admissions;

use auth;
use App\Models\admission;
use App\Traits\WebResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Applying_admissionResource;
use App\Models\Applying_for_university_admission ;
use App\Http\Requests\Applying_admissionValidationRequest;
use App\Http\Requests\update_Applying_admissioRequest;
use App\Models\student;
use App\Models\admission_time;


class Applying_admission extends Controller
{
    use WebResponse;
// وضع شرط التحقق من الوقت ومن تكرار الرغبات في Middelwere check_applying_permission
public function Applying_student(Applying_admissionValidationRequest $request){

    $user = auth()->user();

    $time = admission_time::where('is_active', true)->latest()->first();


    if ($time) {
        if (now()->lt($time->start_date) || now()->gt($time->end_date)) {
            return response()->json(['message' => 'فترة التقديم غير متاحة حاليًا'], 403);
        }
    }
    $frequent=Applying_for_university_admission::where('user_id',$user->id)->exists();
    if($frequent){   return response()->json(['message'=>'لا يمكن التقدم للمفاضلة مرتين , بل يمكنك تعديل طلب التقدم'],403);
    }

    $desires = [
        $request->first_desir_code,
        $request->Second_desir_code,
        $request->third_desir_code,
        $request->fourth_desir_code,
        $request->fifth_desir_code,
        $request->sixth_desir_code,
    ];

    $filteredDesires = array_filter($desires);

    $existingDesires = admission::whereIn('desire_code', $filteredDesires)->pluck('desire_code')->toArray();

    $missingDesires = array_diff($filteredDesires, $existingDesires);

    if (count($missingDesires) > 0) {
        return response()->json([
            'message' => 'بعض الرغبات غير موجودة في قاعدة البيانات',
            'missing_desires' => array_values($missingDesires)
        ], 422);
    
    }



 
    
    $path = $request->file('copy_of_certificate')->store('certificates', 'public');
$Applying=Applying_for_university_admission::create([
'user_id' => $user->id,
'first_desir_code'=>$request->first_desir_code,
'Second_desir_code'=>$request->Second_desir_code,
'third_desir_code'=>$request->third_desir_code,
'fourth_desir_code'=>$request->fourth_desir_code,
'fifth_desir_code'=>$request->fifth_desir_code,
'sixth_desir_code'=>$request->sixth_desir_code,
'score'=>$request->score,
'copy_of_certificate' => $path, 
]);


return $this->response(new Applying_admissionResource($Applying),'Best wishes',200);
}



public function update_Applying_student(update_Applying_admissioRequest $request)
{
    $user = auth()->user();
    $applying = Applying_for_university_admission::where('user_id', $user->id)->firstOrFail();


    $time = admission_time::where('is_active', true)->latest()->first();
    if ($time) {
        if (now()->lt($time->start_date) || now()->gt($time->end_date)) {
            return response()->json(['message' => 'فترة التقديم غير متاحة حاليًا'], 403);
        }
    }

    $desires = [
        $request->first_desir_code,
        $request->Second_desir_code,
        $request->third_desir_code,
        $request->fourth_desir_code,
        $request->fifth_desir_code,
        $request->sixth_desir_code,
    ];

    $filteredDesires = array_filter($desires);

    $existingDesires = admission::whereIn('desire_code', $filteredDesires)->pluck('desire_code')->toArray();

    $missingDesires = array_diff($filteredDesires, $existingDesires);

    if (count($missingDesires) > 0) {
        return response()->json([
            'message' => 'بعض الرغبات غير موجودة في قاعدة البيانات',
            'missing_desires' => array_values($missingDesires)
        ], 422);
    
    }

    if ($request->has('first_desir')) {
        $applying->first_desir = $request->first_desir;
    }
    if ($request->has('Second_desir')) {
        $applying->Second_desir = $request->Second_desir;
    }
    if ($request->has('third_desir')) {
        $applying->third_desir = $request->third_desir;
    }
    if ($request->has('fourth_desir')) {
        $applying->fourth_desir = $request->fourth_desir;
    }
    if ($request->has('fifth_desir')) {
        $applying->fifth_desir = $request->fifth_desir;
    }
    if ($request->has('sixth_desir')) {
        $applying->sixth_desir = $request->sixth_desir;
    }
    if ($request->has('score')) {
        $applying->score = $request->score;
    }

    if ($request->hasFile('copy_of_certificate')) {
        $path = $request->file('copy_of_certificate')->store('certificates', 'public');
        $applying->copy_of_certificate = $path;
    }
    $applying->update(['status'=>'updated']);


    $applying->save();

    return $this->response(new Applying_admissionResource($applying), 'The admission has been successfully updated.', 200);
}


}

















