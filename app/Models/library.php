<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class library extends Model
{
    use HasFactory;
    public function Library_type(){

return $this->belongsTo(Library_type::class);
        
}
public function teacher_department(){

return $this->belongsTo(teacher_department::class);
                
}

}
