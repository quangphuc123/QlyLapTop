<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CartDetail;
use App\Models\User;

class Cart extends Model
{
    use SoftDeletes;
    protected $table='carts';
    protected $fillable=[
        'user_id',
        'total',
    ];
    protected $dateFormat='Y-m-d H:i:s';
    public function products(){
        return $this->hasMany(CartDetail::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
