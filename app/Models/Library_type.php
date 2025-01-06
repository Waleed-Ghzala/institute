<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library_type extends Model
{
    use HasFactory;
    public function library(){
        
        return $this->hasMany(library::class);
        }
}
