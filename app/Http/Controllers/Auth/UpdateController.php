<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Traits\WebResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UpdateResource;
use App\Models\request as ModelsRequest;
use App\Http\Requests\UpdateValidationRequest;
use App\Http\Requests\studentValidationRequest;

class UpdateController extends Controller
{
    use WebResponse;
public function update(UpdateValidationRequest $request){

    $user = auth()->user();

    if ($request->has('full_name')) {
        $user->full_name = $request->full_name;
    }
    if ($request->has('email')) {
        $user->email = $request->email;
    }
    if ($request->has('password')) {
        $user->password = Hash::make($request->password);
    }
    if ($request->has('address')) {
        $user->address = $request->address;
    }
    if ($request->has('Mobile_number')) {
        $user->Mobile_number = $request->Mobile_number;
    }if ($request->has('birth_date')) {
        $user->birth_date = $request->birth_date;
    }
    $user->save();
    return $this->response( new UpdateResource($user), 'Your profile data has been updated successfully', 200);












}
}
