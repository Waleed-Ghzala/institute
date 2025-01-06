<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\teacher;
use App\Models\employee;
use Tymon\JWTAuth\JWTAuth;
use App\Traits\WebResponse;
use Illuminate\Http\Request;
use App\Events\StudentApproved;
use App\Models\pending_student;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Http\Resources\teacherResource;
use App\Http\Resources\EmployeeResource;
use App\Http\Requests\studentValidationRequest;
use App\Http\Requests\employeeValidationRequest;

class RegisterController extends Controller
{
    use WebResponse;
 public function Student_Rigester(studentValidationRequest $request){

//حساب الطالب يخزن مؤقتا في جدول pending_student    
pending_student::create([
'full_name' => $request->full_name,
'email' => $request->email,
'password' => bcrypt($request->password),  
'address' => $request->address,
'Mobile_number' => $request->Mobile_number,
'birth_date' => $request->birth_date,
'role' => 'student', 
]);
 return response()->json(['message' => 'Your account is awaiting approval'], 201);
    }


public function approve_student(Request $request, $id){

    if (!auth()->user() || !auth()->user()->hasRole('manager')) {
        return response()->json(['message' => 'Unauthorized'], 403);
    }
$pendingStudent=pending_student::find($id);
if(!$pendingStudent){
return response()->json(['message' => 'there are not any user'], 201);

};
 event(new StudentApproved($pendingStudent));

 return response()->json(['message' => 'student approved successfully.'], 200);

    }

    public function teacher_Rigester(studentValidationRequest $request){

        if (!auth()->user() || !auth()->user()->hasRole('manager')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $user=User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),  
            'address' => $request->address,
            'Mobile_number' => $request->Mobile_number,
            'birth_date' => $request->birth_date,
            'role' => 'teacher', 
            'approved'=>true,

            ]);
            teacher::create([
                'user_id' => $user->id,
            ]);

            $token = auth()->login($user);
         
            return $this->response(new teacherResource($user,$token), 'The account has been created successfully', 200);
}


 public function employee_Rigester(employeeValidationRequest $request){

if (!auth()->user() || !auth()->user()->hasRole('manager')) {
return response()->json(['message' => 'Unauthorized'], 403);
     }

    $user=User::create([
     'full_name' => $request->full_name,
      'email' => $request->email,
    'password' => bcrypt($request->password), 
     'address' => $request->address,
         'Mobile_number' => $request->Mobile_number,
       'birth_date' => $request->birth_date,
        'role' => 'employee', 
     'approved' => true,
            
]);
   employee::create([
     'user_id' => $user->id,
    '_administrative_department_id'=>$request->_administrative_department_id,
     'employe_type'=>$request->employe_type,

      ]);
      $token = auth()->login($user);
      
      return $this->response(new EmployeeResource($user,$token), 'The account has been created successfully', 200);
            
                            }
    }


