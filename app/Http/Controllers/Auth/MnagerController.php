<?php

namespace App\Http\Controllers\Auth;

use App\Models\Classes;
use App\Models\department;

use App\Traits\WebResponse;
use Illuminate\Http\Request;
use App\Models\class_department;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClassResource;
use App\Http\Resources\DepartmentResource;
use App\Http\Resources\Administrative_DepartmentResource;
use App\Http\Resources\Teacher_DepartmentResource;

use App\Models\_adminstrative_departments;
use App\Http\Resources\Class_DepartmentResource;
use App\Models\teacher_department;

class MnagerController extends Controller
{
    use WebResponse;

    public function Add_department(Request $request){

        $user = auth()->user();
    
        if (!$user || !$user->hasRole('manager')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
    
$validatedData = $request->validate([
'department_name' => 'required|string|max:255',
]);
    
 $department=Department::create([
 'department_name' => $request->department_name,
        ]);
return $this->response(new DepartmentResource($department), 'department  was added successfully', 200);

    
    }
    public function Add_class(Request $request){
    
        $user = auth()->user();
    
        if (!$user || !$user->hasRole('manager')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
    
        $validatedData = $request->validate([
            'students_number' => 'required|numeric',
            'class_name' => 'required|string|max:255',
        ]);
    
$class=Classes::create([
            'class_name' =>$request-> class_name,
            'students_number' =>$request->students_number,
        ]);

return $this->response(new ClassResource($class),'The class was added successfully',200);  
    }


    public function Add_class_department(Request $request){
    
        $user = auth()->user();
    
        if (!$user || !$user->hasRole('manager')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
    
        $validatedData = $request->validate([
          'class_id' => 'required|string',
        'department_id' => 'required|string',
        ]);
    
$class_dep= class_department::create([
            'class_id' =>$request-> class_id,
            'department_id' =>$request->department_id,
        ]);

     return $this->response(new Class_DepartmentResource($class_dep),'The class department was added successfully',200);  

    }
    public function Add_Administrative_departments(Request $request){
    
        $user = auth()->user();
    
        if (!$user || !$user->hasRole('manager')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
    
        $validatedData = $request->validate([
            'department_name' => 'required|string|max:255',
        ]);
    
$adminstretev_dep= _adminstrative_departments::create([
            'department_name' =>$request-> department_name,
        ]);

  return $this->response(new Administrative_DepartmentResource($adminstretev_dep),'The Administrative Departments was added successfully',200);
    }

    public function Add_teacher_department(Request $request){
    
        $user = auth()->user();
    
        if (!$user || !$user->hasRole('manager')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
    
        $validatedData = $request->validate([
            'department_id' => 'required','string',
            'teacher_id' => 'required|string|max:255',
        ]);
    
$teacher_dep=teacher_department::create([
            'department_id' =>$request-> department_id,
            'teacher_id' =>$request->teacher_id,
        ]);

return $this->response(new Teacher_DepartmentResource($teacher_dep),'teacher department was added successfully',200);  
    }
    

}
