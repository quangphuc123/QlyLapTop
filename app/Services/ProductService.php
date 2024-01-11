<?php

namespace App\Services;

use App\Services\Interfaces\ProductServiceInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface as ProductRepository;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\ProductImage;


/**
 * Class ProductService
 * @package App\Services
 */
class ProductService implements ProductServiceInterface
{
    protected $productRepository;

    public function __construct(
        ProductRepository $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    public function paginate($request)
    {
        $condition['keyword'] = addslashes($request->input('keyword'));
        $perPage = $request->integer('perpage');
        $products = $this->productRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => '/product/index'],
            [],
        );
        return $products;
    }
    public function create($request)
    {
        $product_code = mt_rand(100000000,999999999);
        $isExist = $this->productRepository->productCodeExists($product_code);
        if($isExist){
            $product_code = mt_rand(100000000,999999999);
        }
        $request['product_code'] = $product_code;
        $payload = $request->except(['_token', 'send',]);
        $payload['album'] = ($request->input('album') && !empty($request->input('album'))) ? json_encode($request->input('album')) : '';
        $product = $this->productRepository->create($payload);
        return true;
    }

    public function update($id, $request)
    {
            $product = $this->productRepository->findById($id);
            $payload = $request->except(['_token', 'send']);
            $product = $this->productRepository->update($id, $payload);
            DB::commit();
            return true;
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $product = $this->productRepository->delete($id);
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
            'image',
            'description',
            'price',
            'album',
            'sale_price',
            'product_code',
            'product_catalogue_id',
            'brand_id'
        ];
    }
}
