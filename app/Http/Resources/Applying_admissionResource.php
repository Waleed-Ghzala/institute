<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Applying_admissionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return['id'=>$this->id,
        'user_id' => $this->user->id,
                'first_desir_code'=>$this->first_desir_code,
                'Second_desir_code'=>$this->Second_desir_code,
                'third_desir_code'=>$this->third_desir_code,
                'fourth_desir_code'=>$this->fourth_desir_code,
                'fifth_desir_code'=>$this->fifth_desir_code,
                'sixth_desir_code'=>$this->sixth_desir_code,
                'score'=>$this->score,
                'copy_of_certificate' => asset('storage/' . $this->copy_of_certificate),
        
                ];    }
}
