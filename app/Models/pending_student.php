<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pending_student extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name', 'email', 'password', 'address', 'Mobile_number', 'birth_date', 'role'
    ];
}
