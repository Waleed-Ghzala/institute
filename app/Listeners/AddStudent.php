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
 $student=$event->user_id;


student::create([
'user_id' => $event->user_id,

]);
$user = User::find($event->user_id);
if ($user) {
    $user->role = 'student'; // إذا كنت تعتمد على هذا العمود
    $user->save();

    $user->assignRole(['student']); // أو assignRole('student') إن كنت تسمح بعدة أدوار
}


    }

}
