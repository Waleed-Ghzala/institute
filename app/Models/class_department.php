<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class class_department extends Model
{
    use HasFactory;
    protected $fillable = ['class_id','department_id'];


    public function classes(){

        return $this->belongsTo(classes::class);
    }
    public function department(){

        return $this->belongsTo(department::class);
        
     }
public function student(){

return $this->hasMany(student::class);

}
}
