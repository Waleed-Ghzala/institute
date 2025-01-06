<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;
protected $fillable = ['user_id'];

public function user(){
return $this->belongsTo(user::class);
}
public function Penalties(){
        
    return $this->hasMany(Penalties::class);
    }
    public function teacher_department(){
        return $this->hasMany(teacher_department::class);
        }
        public function material_teacher(){
            return $this->hasMany(material_teacher::class);
            }
    

}
