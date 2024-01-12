<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shipping;
use App\Models\User;
use Illuminate\Http\Request;

use App\Services\Interfaces\OrderDetailServiceInterface as OrderDetailService;
use App\Services\Interfaces\OrderServiceInterface as OrderService;
use App\Repositories\Interfaces\OrderDetailRepositoryInterface as OrderDetailRepository;

class OrderDetailController extends Controller
{
    protected $orderDetailService;
    protected $orderService;
    protected $orderDetailRepository;

    public function __construct(
        OrderDetailService $orderDetailService,
        OrderService $orderService,
        OrderDetailRepository $orderDetailRepository,
    ) {
        $this->orderDetailService = $orderDetailService;
        $this->orderService = $orderService;
        $this->orderDetailRepository = $orderDetailRepository;
    }

    public function index($id)
    {
        $order_detail = OrderDetail::where('order_id', $id)->get();
        $order = Order::where('id', $id)->get();
        foreach ($order as $key => $val) {
            $user_id = $val->user_id;
            $shipping_id = $val->shipping_id;
        }
        $user = User::where('id', $user_id)->first();
        $shipping = Shipping::where('id', $shipping_id)->first();
        $order_de = OrderDetail::with('products')->where('order_id', $id)->get();
        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
            ],
            'model' => 'OrderDetail',
        ];
        $config['seo'] = config('apps.order');
        $template = 'admin.order.detail.index';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'order_detail',
                'user',
                'shipping',
                'order_de'
            )
        );
    }
}
