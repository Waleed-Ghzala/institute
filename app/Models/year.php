<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class year extends Model
{
    use HasFactory;

    public function student(){

return $this->hasMany(student::class);
        
}
public function material(){

return $this->hasMany(material::class);

}
}
