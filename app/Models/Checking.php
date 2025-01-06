<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checking extends Model
{
    use HasFactory;

    public function student(){

return $this->belongsTo(student::class);
        
}
public function Days_of_week(){

    return $this->belongsTo(Days_of_week::class);
            
    }
}
