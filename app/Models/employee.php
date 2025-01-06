<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','_administrative_department_id','employe_type'];

    public function user(){

return $this->belongsTo(user::class);
       }
public function Administrative_departments(){

return $this->belongsTo(_adminstrative_departments::class);
       }
}
