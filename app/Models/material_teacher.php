<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class material_teacher extends Model
{
    use HasFactory;
    public function video(){

        return $this-> hasMany(video::class);
    }
    public function material(){

        return $this-> belongsTo(material::class);
    }
    public function teacher(){

        return $this-> belongsTo(teacher::class);
    }
    
}
