<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class _adminstrative_departments extends Model
{
    use HasFactory;
    protected $fillable = ['department_name',];
    
    public function employee(){
    
        return $this-> hasMany(employee::class);
    }
    public function request(){
    
        return $this-> hasMany(request::class);
    }
}
