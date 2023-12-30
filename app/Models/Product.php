<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\QueryScopes;

class Product extends Model
{
    use HasFactory, SoftDeletes,QueryScopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;
    use SoftDeletes;
    protected $table="products";
    protected $fillable = [
        'id',
        'product_catalogue_id',
        'SKU',
        'image_id',
        'brand_id',
        'price',
        'description',
        'name',
    ];
}
