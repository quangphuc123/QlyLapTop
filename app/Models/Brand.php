<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\QueryScopes;


class Brand extends Model
{
    use HasFactory,SoftDeletes,QueryScopes;

    protected $table = 'brands';

    protected $fillable = [
        'name',
        'description',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }

}
