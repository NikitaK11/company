<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function users(){
        return $this->hasMany(User::class,'department_id','id');
    }

    public function chief(){
        return $this->hasOne(User::class,'id','chief_id');
    }
}
