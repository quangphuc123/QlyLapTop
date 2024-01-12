<?php

namespace App\Repositories;

use App\Models\OrderDetail;
use App\Repositories\Interfaces\OrderDetailRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class OrderService
 * @package App\Services
 */
class OrderDetailRepository extends BaseRepository implements OrderDetailRepositoryInterface
{
    protected $model;

    public function __construct(
        OrderDetail $model
    ) {
        $this->model = $model;
    }

    public function pagination(
        array $column = ['*'],
        array $condition = [],
        int $perpage = 1,
        array $extend = [],
        array $oderBy = ['id', 'DESC'],
        array $join = [],
        array $relations = [],
        array $rawWhere = [],
    ) {
        $query = $this->model->select($column)->first()
            ->where($condition);
        if (!empty($join)) {
            $query->join(...$join);
        }
        return $query->paginate($perpage)->withQueryString()->withPath(env('APP_URL') . $extend['path']);
    }
}
