<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher_department extends Model
{
    use HasFactory;
    protected $fillable = ['teacher_id','department_id'];
    public function department(){

        return $this->belongsTo(department::class);
        
}
public function library(){
        
return $this->hasMany(library::class);
}
public function teacher(){

return $this->belongsTo(teacher::class);

}
}
