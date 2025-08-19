<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisements extends Model
{
    use HasFactory;
    protected $fillable=['id','type','advertisement_Content','date','department_id'];
public function department(){
    return $this-> belongsTo(department::class);
}
}
