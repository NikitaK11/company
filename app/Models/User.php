<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    public function getSumPayments(){
        $result = Payment::query()
            ->join('orders','orders.id','=','payments.order_id')
            ->join('events','events.id','=','orders.event_id')
            ->where(['payments.user_id'=>$this->id])
            ->selectRaw('SUM(orders.quantity * events.price) as sum')
            ->pluck('sum');
        return !empty($result[0]) ? $result[0] : 0;
    }

    public function userType(){
        return $this->hasOne(UserType::class,'id','user_type_id');
    }
    public function department(){
        return $this->hasOne(Department::class,'id','department_id');
    }
}
