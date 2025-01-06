<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class request extends Model
{
    use HasFactory;
public function Administrative_departments(){

    return $this-> belongsTo(Administrative_departments::class);
}
public function student(){

    return $this-> belongsTo(student::class);
}
}
