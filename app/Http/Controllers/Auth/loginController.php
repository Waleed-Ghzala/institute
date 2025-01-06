<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Traits\WebResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\StudentResource;
use App\Http\Resources\teacherResource;
use Tymon\JWTAuth\Validators\Validator;
use App\Http\Resources\EmployeeResource;
use App\Models\request as ModelsRequest;
use App\Http\Resources\ManagerLoginResource;
use App\Http\Requests\LoginValidationRequest;

class loginController extends Controller
{
    use WebResponse;


public function login_Manager(LoginValidationRequest $request){
   
    $data = $request->only('email', 'password');

    if (!$token = auth()->attempt($data)) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    $user = auth()->user();

    if (!$user->hasRole('manager')) {
        return response()->json(['error' => 'Unauthorized'], 403);
    }
    $user->token = $token;

    return $this->response(new ManagerLoginResource($user), 'You have been logged in successfully', 200);


}
public function login_student(LoginValidationRequest $request){
   
    $data = $request->only('email', 'password');

    if (!$token = auth()->attempt($data)) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    $user = auth()->user();
   

    
    $token=$user->token = $token;

    
 return $this->response(new StudentResource($user, $token), 'You have been logged in successfully', 200);

}


public function login_teacher(LoginValidationRequest $request){
   
    $data = $request->only('email', 'password');

    if (!$token = auth()->attempt($data)) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    $user = auth()->user();    
  $token=$user->token = $token;
    
  return $this->response(new teacherResource($user,$token), 'You have been logged in successfully', 200);


}
public function login_employee(LoginValidationRequest $request){
   
    $data = $request->only('email', 'password');

    if (!$token = auth()->attempt($data)) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    $user = auth()->user();
    $token=$user->token = $token;

    return $this->response(new EmployeeResource($user,$token), 'You have been logged in successfully', 200);

}
public function logout()
{
    auth()->logout();

    return response()->json(['message' => 'Successfully logged out']);
}
    }












