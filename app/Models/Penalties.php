<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penalties extends Model
{
    use HasFactory;
    public function student(){

return $this->belongsTo(student::class);

    }
    public function teacher(){

        return $this->belongsTo(teacher::class);
        
            }

}
