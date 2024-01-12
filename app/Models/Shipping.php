<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipping_name',
        'shipping_address',
        'shipping_phone',
        'shipping_email',
        'user_id'
    ];
    protected $table = 'shippings';

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}
