<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_marks extends Model
{
    use HasFactory;
    public function student(){

        return $this->belongsTo(student::class);
        
}
public function material_student(){

return $this->belongsTo(material_student::class);

}
}
