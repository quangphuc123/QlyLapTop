<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\QueryScopes;
use App\Models\User;

class Product extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, QueryScopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;
    use SoftDeletes;
    protected $table="products";

    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'sale_price',
        'product_code',
        'album',
        'product_catalogue_id',
        'brand_id'
    ];
    public function product_catalogues()
    {
        return $this->belongsTo(ProductCatalogue::class, 'product_catalogue_id', 'id');
    }
    public function brands()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }


    public function wishlist1(){
        return $this->belongsToMany(User::class,'wishlist','product_id','user_id')->count();
    }
}
