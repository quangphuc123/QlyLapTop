<?php

namespace App\Services;

use App\Services\Interfaces\OrderDetailServiceInterface;
use App\Services\BaseService;
use App\Repositories\Interfaces\OrderDetailRepositoryInterface as OrderDetailRepository;
use Illuminate\Support\Facades\DB;




/**
 * Class OrderService
 * @package App\Services
 */
class OrderDetailService extends BaseService implements OrderDetailServiceInterface
{
    protected $orderDetailRepository;
    public function __construct(
        OrderDetailRepository $orderDetailRepository,
    ) {
        $this->orderDetailRepository = $orderDetailRepository;
    }
    public function paginate($request)
    {
        $condition['keyword'] = addslashes($request->input('keyword'));
        $perPage = $request->integer('perpage');
        $orderdetails = $this->orderDetailRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => '/order/detail/index'],
            [],
        );
        return $orderdetails;
    }
    public function update($id, $request)
    {
        DB::beginTransaction();
        try {
            $orderdetail = $this->orderDetailRepository->findById($id);
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
            $order = $this->orderDetailRepository->delete($id);
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
            'quantity',
            'price',
            'order_id',
            'product_id',
        ];
    }
}
