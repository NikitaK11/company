<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function event(){
        return $this->hasOne(Event::class,'id','event_id');
    }

    public function type(){
        return $this->hasOne(UserType::class,'user_type_id','id');
    }
}
