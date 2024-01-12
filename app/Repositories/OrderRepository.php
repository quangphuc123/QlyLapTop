<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderCatalogue;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class OrderService
 * @package App\Services
 */
class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    protected $model;

    public function __construct(
        Order $model
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
        $query = $this->model->select($column, 'users.name','users.email')
            ->where(
                function ($query) use ($condition) {
                    if (isset($condition['keyword']) && !empty($condition['keyword'])) {
                        $query->where('order_total', 'LIKE', '%' . $condition['keyword'] . '%');
                        $query->where('order_status', 'LIKE', '%' . $condition['keyword'] . '%');
                        $query->where('created_at', 'LIKE', '%' . $condition['keyword'] . '%');
                    }
                    return $query;
                }
            );
        if (!empty($join)) {
            $query->join($join);
        }
        return $query->paginate($perpage)->withQueryString()->withPath(env('APP_URL') . $extend['path']);
    }
}
