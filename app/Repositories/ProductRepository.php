<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductCatalogue;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class ProductService
 * @package App\Services
 */
class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    protected $model;

    public function __construct(
        Product $model
    ) {
        $this->model = $model;
    }

    public function productCodeExists($productcode){
        return Product::whereProductCode($productcode)->exists();
    }
    public function pagination(
        array $column = ['*'],
        array $condition = [],
        int $perpage = 1,
        array $extend = [],
        array $oderBy = ['id','DESC'],
        array $join = [],
        array $relations = [],
        array $rawWhere = [],
    ) {
        $query = $this->model->select($column)
            ->where(function ($query) use ($condition) {
                if (isset($condition['keyword']) && !empty($condition['keyword'])) {
                    $query->where('name', 'LIKE', '%' . $condition['keyword'] . '%')
                        ->orWhere('product_code', 'LIKE', '%' . $condition['keyword'] . '%');
                }
                return $query;
            })->with('product_catalogues');

        if (!empty($join)) {
            $query->join(...$join);
        }
        return $query->paginate($perpage)->withQueryString()->withPath(env('APP_URL') . $extend['path']);
    }
}
