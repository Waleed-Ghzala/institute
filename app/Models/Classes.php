<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $fillable = ['class_name','students_number'];


    public function class_department(){

return $this->hasMany(class_department::class);

    }
}
