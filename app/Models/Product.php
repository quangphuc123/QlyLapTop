<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\QueryScopes;
use App\Models\ProductImage;


class Product extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, QueryScopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table="products";

    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'sale_price',
        'product_code',
        'product_catalogue_id',
    ];
    public function product_catalogues()
    {
        return $this->belongsTo(ProductCatalogue::class, 'product_catalogue_id', 'id');
    }

    // public function product_images(){
    //     return $this->belongsTo(ProductImage::class);
    // }

}
