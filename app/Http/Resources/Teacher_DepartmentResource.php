<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Teacher_DepartmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
           'id'=>$this->id,
           'department_id'=>$this->department_id,
        'teacher_id'=>$this->teacher_id,
        ];
    }
}
