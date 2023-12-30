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

<<<<<<< HEAD
=======

>>>>>>> de0e26ecd37d7a71e45bdb13191a82922a51948e
class Product extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, QueryScopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
<<<<<<< HEAD
    use HasFactory;
    use SoftDeletes;
    protected $table="products";
=======
    protected $table="products";

>>>>>>> de0e26ecd37d7a71e45bdb13191a82922a51948e
    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'sale_price',
        'product_code',
        'album',
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
