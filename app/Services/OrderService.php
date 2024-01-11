<?php

namespace App\Services;

use App\Services\Interfaces\OrderServiceInterface;
use App\Services\BaseService;
use App\Repositories\Interfaces\OrderRepositoryInterface as OrderRepository;
use App\Repositories\Interfaces\RouterRepositoryInterface as RouterRepository;
use Illuminate\Support\Facades\DB;




/**
 * Class OrderService
 * @package App\Services
 */
class OrderService extends BaseService implements OrderServiceInterface
{
    protected $orderRepository;
    public function __construct(
        OrderRepository $orderRepository,
    ) {
        $this->orderRepository = $orderRepository;
    }
    public function paginate($request)
    {
        $condition['keyword'] = addslashes($request->input('keyword'));
        $perPage = $request->integer('perpage');
        $orders = $this->orderRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => '/order/index'],
            [],
        );
        return $orders;
    }
    public function update($id, $request)
    {
        DB::beginTransaction();
        try {
            $order = $this->orderRepository->findById($id);
            if($this->uploadOrder($order, $request)){
                $this->updateCatalogueForOrder($order, $request);
            }
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
    private function uploadOrder($order, $request){
        $payload = $request->only($this->payload());
        return $this->orderRepository->update($order->id, $payload);
    }
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $order = $this->orderRepository->delete($id);
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
            'address',
            'email',
            'phone',
            'status',
            'user_id',
            'payment_id',
            'total',
        ];
    }
}
