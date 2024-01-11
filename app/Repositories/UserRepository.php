<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class UserService
 * @package App\Services
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(
        User $model
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
        $query = $this->model->select($column)
            ->where(function ($query) use ($condition) {
                if (isset($condition['keyword']) && !empty($condition['keyword'])) {
                    $query->where('name', 'LIKE', '%' . $condition['keyword'] . '%')
                        ->orWhere('email', 'LIKE', '%' . $condition['keyword'] . '%')
                        ->orWhere('address', 'LIKE', '%' . $condition['keyword'] . '%')
                        ->orWhere('phone', 'LIKE', '%' . $condition['keyword'] . '%');
                }
                // dd($condition);
                if (isset($condition['publish']) && $condition['publish'] != 0) {
                    // dd($condition);
                    $query->where('publish', '=', $condition['publish']);
                }
                return $query;
            })->with('user_catalogues');

        if (!empty($join)) {
            $query->join(...$join);
        }
        return $query->paginate($perpage)->withQueryString()->withPath(env('APP_URL') . $extend['path']);
    }
}
