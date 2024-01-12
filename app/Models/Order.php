<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_id',
        'order_status',
        'order_total',
        'created_at',
        'shipping_id'
    ];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function shipping(){
        return $this->hasOne(Shipping::class,'id','shipping_id');
    }

    public function details(){
        return $this->belongsToMany(OrderDetail::class,'order_id','id');
    }

    public function payment(){
        return $this->hasOne(Payment::class,'id','payment_id');
    }
}
