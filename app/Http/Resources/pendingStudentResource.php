<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class pendingStudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        {
            return[
    'id' => $this->id ,
    'full_name'=>$this->full_name,
    'email'=>$this->email,
    'address' =>$this-> address,
    'Mobile_number' =>$this-> Mobile_number,
    'birth_date' => $this->birth_date,
    'role' => 'student',
    'token' => $this->token,
            ];    }

    }
}
