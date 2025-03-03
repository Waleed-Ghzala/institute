<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class pending_student extends Authenticatable implements JWTSubject
{
    protected $table = 'pending_students';

    use HasFactory;
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
}
