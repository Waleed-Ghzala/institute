<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UpdateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[ 
            'full_name'=>$this->full_name,
            'email'=>$this->email,
            'password'=>$this->password,
            'address' => $this->address,
            'Mobile_number' =>$this-> Mobile_number,
            'birth_date' => $this->birth_date,
            
                ];
    }
}
