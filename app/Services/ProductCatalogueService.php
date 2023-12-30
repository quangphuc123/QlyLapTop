<?php

namespace App\Services;

use App\Services\Interfaces\ProductCatalogueServiceInterface;
use App\Repositories\Interfaces\ProductCatalogueRepositoryInterface as ProductCatalogueRepository;
use App\Repositories\Interfaces\ProductRepositoryInterface as ProductRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;


/**
 * Class ProductCatalogueService
 * @package App\Services
 */
class ProductCatalogueService implements ProductCatalogueServiceInterface
{
    protected $productCatalogueRepository;
    protected $productRepository;

    public function __construct(
        ProductCatalogueRepository $productCatalogueRepository,
        ProductRepository $productRepository
    ) {
        $this->productCatalogueRepository = $productCatalogueRepository;
        $this->productRepository = $productRepository;
    }

    public function paginate($request)
    {
        $condition = [
            'keyword' => addslashes($request->input('keyword')),
            'publish' => $request->integer('publish'),
        ];
        $perPage = $request->integer('perpage');
        $productCatalogues = $this->productCatalogueRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => 'product/catalogue/index'],
            ['id','DESC'],
            [],
            ['products'],
        );
        return $productCatalogues;
    }
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send']); //Lấy ra hết trừ 3 cái trên
            $product = $this->productCatalogueRepository->create($payload);
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
            $product = $this->productCatalogueRepository->update($id, $payload);
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
            $product = $this->productCatalogueRepository->delete($id);
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
