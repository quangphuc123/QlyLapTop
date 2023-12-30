<?php

namespace App\Repositories\Interfaces;

/**
 * Interface BaseServiceInterface
 * @package App\Services\Interfaces
 */
interface BaseRepositoryInterface
{
    public function all(array $relation);
    public function findById(
        int $id
    );
    public function create(array $payload);
    public function update(int $id = 0, array $payload = []);
    public function delete(int $id = 0);
    public function pagination(
        array $column = ['*'],
        array $condition = [],
        int $perpage = 1,
        array $extend = [],
        array $oderBy = ['id','DESC'],
        array $join = [],
        array $relations = [],
    );
    public function updateByWhereIn($WhereInField = '', array $WhereIn = [], array $payload = []);
    public function createPivot($model, array $payload = [], string $relation = '');
}
