<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product;
use App\Models\Cart;

class CartDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='cart_detail';
    protected $fillable=[
        'cart_id',
        'product_id',
    ];
    protected $dateFormat='Y-m-d H:i:s';
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function cart(){
        return $this->belongsTo(Cart::class);
    }
}
