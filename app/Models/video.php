<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    use HasFactory;

    public function material_teacher(){
        return $this->belongsTo(material_teacher::class);
        }
}
