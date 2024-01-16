<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

use App\Services\Interfaces\OrderServiceInterface as OrderService;
use App\Repositories\Interfaces\OrderRepositoryInterface as OrderRepository;

class OrderController extends Controller
{
    protected $orderService;
    protected $orderRepository;

    public function __construct(
        OrderService $orderService,
        OrderRepository $orderRepository,
    ) {
        $this->orderService = $orderService;
        $this->orderRepository = $orderRepository;
    }

    public function index(Request $request)
    {
        $orders = $this->orderService->paginate($request);
        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
            ],
            'model' => 'Order',
        ];
        $config['seo'] = config('apps.order');
        $template = 'admin.order.order.index';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'orders',
            )
        );
    }

    public function update($id, Request $request)
    {
        $update_order = Order::find($id);
        $update_payment = Payment::find($update_order->payment_id);
        $update_order->order_status = $request->order_status;
        $update_payment->payment_status = $request->payment_status;
        $update_order->save();
        $update_payment->save();
        return back()->with('success', 'Đơn hàng cập nhật thành công');
    }

    public function delete($id)
    {
        // $this->authorize('modules', 'order.order.destroy');

        $config['seo'] = config('apps.order');
        $order = $this->orderRepository->findById($id);
        $template = 'admin.order.order.delete';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'order',
            )
        );
    }

    public function destroy($id)
    {
        if ($this->orderService->destroy($id)) {
            return redirect()->route('order.order.index')
                ->with('success', 'Xóa nhóm bài viết thành công');
        }
        return redirect()->route('dashboard.index')
            ->with('error', 'Xóa nhóm bài viết không thành công');
    }

    private function configData()
    {
        return [
            'js' => [
                'backend/plugins/ckeditor/ckeditor.js',
                'backend/plugins/ckfinder_2/ckfinder.js',
                'backend/library/finder.js',
                'backend/library/seo.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            ],
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
            ]
        ];
    }
}
