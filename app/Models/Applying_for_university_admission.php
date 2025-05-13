<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applying_for_university_admission extends Model
{
    use HasFactory;
    protected $fillable=['id','user_id','first_desir_code','Second_desir_code','third_desir_code','fourth_desir_code',
    'fifth_desir_code','sixth_desir_code','score','copy_of_certificate','status'];

    public function user(){
        return $this->belongsTo(user::class);
    }
}
