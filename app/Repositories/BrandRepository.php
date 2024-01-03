<?php

namespace App\Repositories;

use App\Models\Brand;
use App\Repositories\Interfaces\BrandRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class BrandService
 * @package App\Services
 */
class BrandRepository extends BaseRepository implements BrandRepositoryInterface
{
    protected $model;

    public function __construct(
        Brand $model
    ) {
        $this->model = $model;
    }
}
