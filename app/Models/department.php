<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use HasFactory;
    protected $fillable = ['department_name'];
    
    public function teacher_department(){

return $this->hasMany(teacher_department::class);
        
}
public function material(){

return $this->hasMany(material::class);
                
}
public function class_department(){

return $this->hasMany(class_department::class);

}
public function advertisements(){

return $this->hasMany(advertisements::class);

}   
}
