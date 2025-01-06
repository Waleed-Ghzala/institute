<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class teacherResource extends JsonResource
{
   protected $token;

    public function __construct($resource, $token)
    {
        parent::__construct($resource);
        $this->token = $token;
    }
    public function toArray(Request $request): array
    {
        return[ 
'id' => $this->teacher->id ,
'user_id' => $this->id, 
'full_name'=>$this->full_name,
'email'=>$this->email,
'address' => $this->address,
'Mobile_number' =>$this-> Mobile_number,
'birth_date' => $this->birth_date,
'role' => 'teacher',
'token' => $this->token,
    ];
    }
}
