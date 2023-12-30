<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base;
use Illuminate\Support\Arr;

/**
 * Class BaseService
 * @package App\Services
 */
class BaseRepository implements BaseRepositoryInterface
{
    protected $model;
    public function __construct(
        Model $model
    ) {
        $this->model = $model;
    }
    public function pagination(
        array $column = ['*'],
        array $condition = [],
        int $perpage = 1,
        array $extend = [],
        array $oderBy = ['id','DESC'],
        array $join = [],
        array $relations = [],
        array $rawQuery = [],
    ) {
        $query = $this->model->select($column);
        return $query
                ->keyword($condition['keyword'] ?? null)
                ->publish($condition['publish'] ?? null)
                ->relationCount($relations ?? null)
                ->CustomWhere($condition['where'] ?? null)
                ->CustomWhereRaw($rawQuery['whereRaw'] ?? null)
                ->CustomJoin($join ?? null)
                ->CustomGroupBy($extend['groupBy'] ?? null)
                ->CustomOderBy($oderBy ?? null)
                ->paginate($perpage)
                ->withQueryString()
                ->withPath(env('APP_URL') . $extend['path']);
    }

    public function create(array $payload)
    {
        $model = $this->model->create($payload);
        return $model->fresh();
    }

    public function update(int $id = 0, array $payload = [])
    {
        $model = $this->findById($id);
        return $model->update($payload);
    }

    public function updateByWhereIn($WhereInField = '', array $whereIn = [], array $payload = [])
    {
        return $this->model->whereIn($WhereInField, $whereIn)->update($payload);
    }

    public function updateByWhere($condition = [], array $payload = [])
    {
        $query = $this->model->newQuery();
        foreach($condition as $key => $val){
            $query->where($val[0], $val[1], $val[2]);
        }
        return $query->update($payload);
    }

    public function delete(int $id = 0)
    {
        return $this->findById($id)->delete();
    }

    //Đây là phương thức xóa đi luôn
    public function forceDelete(int $id = 0)
    {
        return $this->findById($id)->forceDelete();
    }

    public function all(array $relation=[])
    {
        return $this->model->with($relation)->get();
    }

    public function findById(
        int $modelId,
        array $column = ['*'],
        array $relation = []
    ) {
        return $this->model->select($column)->with($relation)->findOrFail($modelId);
    }
    public function findByCondition($condition = []){
        $query = $this->model->newQuery();
        foreach($condition as $key => $val){
            $query->where($val[0], $val[1], $val[2]);
        }
        return $query->first();
    }

    public function createPivot($model, array $payload = [], string $relation = ''){
        return $model->{$relation}()->attach($model->id ,$payload);
    }
}
