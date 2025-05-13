<?php

namespace App\Listeners;

use App\Events\StudentReject;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;

class DeleteStudent
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

   
    public function handle(StudentReject $event)
    {
        $user_id =$event->user_id;

$user=user::where('id',$user_id);
if ($user) {
    $user->delete(); 
}
    }
}
