<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class admissionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    { return[
        'id'=>$this->id,
        'dersir_name'=>$this->dersir_name,
        'scor'=>$this->scor,
        'desire_code'=>$this->desire_code	,
        
    ];
    }
}
