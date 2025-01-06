<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class material extends Model
{
    use HasFactory;
    
    public function department(){

return $this->belongsTo(department::class);
        
}
public function year(){

return $this->belongsTo(year::class);
                
}
public function material_student(){

return $this->hasMany(material_student::class);

}
public function material_teacher(){

    return $this->hasMany(material_teacher::class);
    
    }
}
