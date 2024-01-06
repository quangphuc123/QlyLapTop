<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'address',
        'email',
        'phone',
        'user_id',
        'payment_id',
        'status',
    ];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function detail(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }

    public function payment(){
        return $this->hasOne(Payment::class,'id','payment_id');
    }
}
