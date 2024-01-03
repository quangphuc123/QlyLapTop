<?php

namespace App\Services;

use App\Services\Interfaces\BrandServiceInterface;
use App\Repositories\Interfaces\BrandRepositoryInterface as BrandRepository;
use App\Repositories\Interfaces\ProductRepositoryInterface as ProductRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;


/**
 * Class BrandService
 * @package App\Services
 */
class BrandService implements BrandServiceInterface
{
    protected $brandRepository;
    protected $productRepository;

    public function __construct(
        BrandRepository $brandRepository,
        ProductRepository $productRepository
    ) {
        $this->brandRepository = $brandRepository;
        $this->productRepository = $productRepository;
    }

    public function paginate($request)
    {
        $condition = [
            'keyword' => addslashes($request->input('keyword')),
        ];
        $perPage = $request->integer('perpage');
        $brands = $this->brandRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => 'brand/index'],
            ['id','DESC'],
            [],
            ['products'],
        );
        return $brands;
    }
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send']); //Lấy ra hết trừ 3 cái trên
            $brand = $this->brandRepository->create($payload);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();
            die();
            return false;
        }
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send']); //Lấy ra hết trừ 2 cái trên
            $brand = $this->brandRepository->update($id, $payload);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();
            die();
            return false;
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $brand = $this->brandRepository->delete($id);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();
            die();
            return false;
        }
    }

    private function paginateSelect()
    {
        return [
            'id',
            'name',
            'description',
        ];
    }
}
