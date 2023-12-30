<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\QueryScopes;


class ProductCatalogue extends Model
{
    use HasFactory, SoftDeletes,QueryScopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
    ];

    protected $table = 'product_catalogues';

    public function products()
    {
        return $this->hasMany(Product::class, 'product_catalogue_id', 'id');
    }
}
