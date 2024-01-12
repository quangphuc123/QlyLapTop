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
        // $condition['where'] = [
        //     // ['order_details.order_id ', '=', 'orders.id'],
        // ];
        $orderdetails = $this->orderDetailRepository->pagination(
            $this->paginateSelect(),
            // $condition,
            ['path' => '/order/detail/index'],
            [
                ['users as tb2', 'orders.user_id', '=', 'tb2.id',],
                ['shippings as tb3', 'orders.id', '=', 'tb3.id',],
                ['order_details as tb4', 'orders.id', '=', 'tb4.order_id',]
            ],
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
            'ordes.id',
            'ordes.order_total',
            'ordes.order_status',
            'ordes.user_id',
            'ordes.shipping_id',
            'orders.payment_id',
            'tb2.name',
            'tb2.phone',
            'tb2.address',
            'tb2.email ',
            'tb3.shipping_name ',
            'tb3.shipping_address ',
            'tb3.shipping_phone ',
            'tb3.shipping_email ',
            'tb3.shipping_note ',
            'tb4.order_id ',
            'tb4.product_id  ',
            'tb4.product_name ',
            'tb4.price ',
            'tb4.quantity ',
        ];
    }
}
