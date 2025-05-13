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
use App\Http\Resources\pendingStudentResource;
use App\Http\Requests\studentValidationRequest;
use App\Http\Requests\employeeValidationRequest;

class RegisterController extends Controller
{
    use WebResponse;
    
 public function Student_Rigester(studentValidationRequest $request){

$user=user::create([
'full_name' => $request->full_name,
'email' => $request->email,
'password' => bcrypt($request->password),  
'address' => $request->address,
'Mobile_number' => $request->Mobile_number,
'birth_date' => $request->birth_date,
'role' => 'pendingStudent', 
]);
$token = auth()->login($user);
$user->assignRole('pendingStudent');

return $this->response(new pendingStudentResource($user,$token),'wellcom',200);
    }


// يوجد middelwere 'register' للتحقق ان الذي يضيف المدرس والموظف هو مدير register middleware
    public function teacher_Rigester(studentValidationRequest $request){

      
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
            $user->assignRole('teacher');

            $token = auth()->login($user);
         
            return $this->response(new teacherResource($user,$token), 'The account has been created successfully', 200);
}

// يوجد middelwere 'register' للتحقق ان الذي يضيف المدرس والموظف هو مدير register middleware

 public function employee_Rigester(employeeValidationRequest $request){

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
      $user->assignRole('employee');

      $token = auth()->login($user);
      
      return $this->response(new EmployeeResource($user,$token), 'The account has been created successfully', 200);
            
                            }
    }


