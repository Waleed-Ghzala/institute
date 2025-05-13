<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles; 

class pending_student extends Authenticatable implements JWTSubject
{
    protected $table = 'pending_students';

    use HasFactory,HasRoles;
    protected $fillable = [
        'id','full_name', 'email', 'password', 'address', 'Mobile_number', 'birth_date', 'role'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    public function Applying_for_university_admission(){
        return $this->hasOne( Applying_for_university_admission::class);
     }
}
