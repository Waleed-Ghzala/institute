<?php

namespace App\Listeners;

use App\Models\user;
use App\Models\student;
use App\Events\StudentApproved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddStudent
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(StudentApproved $event): void
    {
 $pendingStudent=$event->pendingStudent;
$user=user::create([

'full_name'=>$pendingStudent->full_name,
'email'=>$pendingStudent->email,
'password'=>$pendingStudent->password,
'address'=>$pendingStudent->address,
'status' =>'approved',
'Mobile_number'=>$pendingStudent->Mobile_number,
'birth_date'=>$pendingStudent->birth_date,
'role'=>$pendingStudent->role,


]);

student::create([
'user_id'=>$user->id,

]);
$pendingStudent->delete();
$user->assignRole('student');

    }

}
