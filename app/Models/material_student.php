<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class material_student extends Model
{
    use HasFactory;
    public function material(){

return $this->belongsTo(material::class);
        
}
public function student(){

return $this->belongsTo(student::class);

}
public function Student_marks(){

return $this->hasOne(Student_marks::class);

}
                    
}
