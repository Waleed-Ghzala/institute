<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','years_id','class_department_id'];


    public function user(){

  return $this->belongsTo(user::class);
 }
  public function request(){
        
return $this->hasMany(request::class);
}
public function Penalties(){
        
return $this->hasMany(Penalties::class);
}
 
public function material_student(){
        
return $this->hasMany(material_student::class);
}
public function Student_marks(){
        
return $this->hasMany(Student_marks::class);
}
public function Checking(){
        
    return $this->hasMany(Checking::class);
    }
    public function year(){

        return $this->belongsTo(year::class);
       }
       public function class_department(){

        return $this->belongsTo(class_department::class);
       }
      
}
