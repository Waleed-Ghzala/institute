<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Traits\WebResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\StudentResource;
use App\Http\Resources\teacherResource;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\ManagerLoginResource;

class ShowController extends Controller
{
    use WebResponse;
    public function profile()
    {
        $user = Auth::user();

        if ($user->hasRole('manager')) {
            $responseData = new ManagerLoginResource($user);
        }
         elseif ($user->hasRole('teacher')) {
            $responseData = new teacherResource($user);
        } 
        elseif ($user->hasRole('employee')) {
            $responseData = new EmployeeResource($user);
        }
         elseif ($user->hasRole('student')) {
            $responseData = new StudentResource($user);
        } 
        return $this->response($responseData , 'Your profile data has been displayed successfully', 200);


}
public function getUsers($role)
{
    if (!auth()->user() || !auth()->user()->hasRole('manager'))// اضافة رئيس قسم الامتحانات......
     {
        return response()->json(['message' => 'Unauthorized'], 403);
    }
    if (!in_array($role, ['manager', 'teacher', 'student','employee'])) {
        return response()->json(['message' => 'Invalid role'], 400);
    }

    $users = User::where('role', $role)
                 ->select('id','full_name')
                 ->get();

    if ($users->isEmpty()) {
        return response()->json(['message' => 'No users found'], 404);
    }

    return response()->json($users);
}

public function DeleteUser($id){

    if (!auth()->user() || !auth()->user()->hasRole('manager'))// اضافة رئيس قسم الامتحانات......
    {
       return response()->json(['message' => 'Unauthorized'], 403);
   }
    $user= User::find($id);
if(!$user){  
     return response()->json(['message' => 'User not found'], 404);
}
$user->delete();
return response()->json(['message'=>'User deleted successfully'],200);

}

}