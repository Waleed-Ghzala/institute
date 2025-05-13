<?php

namespace App\Http\Controllers\admissions;

use auth;
use App\Models\admission;
use App\Traits\WebResponse;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use App\Http\Controllers\Controller;
use App\Models\request as ModelsRequest;
use App\Http\Resources\admissionResource;
use App\Http\Requests\admissionsValidationRequest;
use App\Http\Requests\updateAdmissionsValidationRequest;

class new_admissions extends Controller

{
    use WebResponse;

public function add_admissions(admissionsValidationRequest $request){
    $user = auth()->user();
    if (
        !$user || 
        !$user->hasRole('employee') || 
        !$user->employee || 
        $user->employee->employe_type !== 'رئيس قسم'
    ) {
        return response()->json(['message' => 'Unauthorized - must be a department head employee'], 403);
    }
    $add_admissions=admission::create([
'dersir_name'=>$request->dersir_name,	
'scor'=>$request->scor,
'desire_code'=>$request->desire_code,	
    ]);
return $this->response(new admissionResource($add_admissions),'The Admissions was added successfully',200);
}


public function update_admission(updateAdmissionsValidationRequest $request,$id){
    $user = auth()->user();
    if (
        !$user || 
        !$user->hasRole('employee') || 
        !$user->employee || 
        $user->employee->employe_type !== 'رئيس قسم'
    ) {
        return response()->json(['message' => 'Unauthorized - must be a department head employee'], 403);
    }
    $admission = admission::find($id);

    if (!$admission) {
        return response()->json(['message' => 'Admission not found'], 404);
    }
    if ($request->has('dersir_name')) {
        $admission->dersir_name = $request->dersir_name;
    } if ($request->has('scor')) {
        $admission->scor = $request->scor;
    } if ($request->has('desire_code')) {
        $admission->desire_code = $request->desire_code;
    }
    
    $admission->update();

    return $this->response(new admissionResource($admission), 'The Admissions was updated successfully', 200);

}


}













