<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ProductCatalogue;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $config = $this->config();
        $productCatalogue = new ProductCatalogue();
        $tableColumns = $productCatalogue->getConnection()->getSchemaBuilder()->getColumnListing($productCatalogue->getTable());
        $result = ProductCatalogue::select('product_catalogues.*', DB::raw('COUNT(products.product_catalogue_id) AS number_cate'))
            ->join('products', 'product_catalogues.id', '=', 'products.product_catalogue_id')
            ->groupBy(array_merge(['product_catalogues.id'], $tableColumns))
            ->get();

        $User = new User();
        $tableColumnUsers = $User->getConnection()->getSchemaBuilder()->getColumnListing($User->getTable());

        $resultAccountCount = DB::table('user_catalogues')
            ->select('user_catalogues.name', DB::raw('COUNT(users.id) as so_luong_tai_khoan'))
            ->leftJoin('users', 'user_catalogues.id', '=', 'users.user_catalogue_id')
            ->groupBy('user_catalogues.name')
            ->get();

        $totalOrders = Order::count();
        $totalUsers = User::count();
        $resultRevenue = DB::table('orders')
            ->select(DB::raw('DAY(created_at) as ngay, MONTH(created_at) as thang'), DB::raw('SUM(order_total) as doanh_so'))
            ->where('order_status', '=', 'Đơn hàng đã được nhận')
            ->groupBy('ngay', 'thang')
            ->get();
        $orders = Order::latest()->limit(5)->get();
        $totalIncome = Order::sum('order_total');
        $template = 'admin.dashboard.home.index';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'result',
                'resultAccountCount',
                'totalOrders',
                'totalUsers',
                'orders',
                'totalIncome',
                'resultRevenue'
            )
        );
    }
    private function config()
    {
        return [
            'js' => [
                'backend/js/plugins/flot/jquery.flot.tooltip.min.js',
                'backend/js/plugins/flot/jquery.flot.spline.js',
                'backend/js/plugins/flot/jquery.flot.resize.js',
                'backend/js/plugins/flot/jquery.flot.js',
                'backend/js/plugins/flot/jquery.flot.pie.js',
                'backend/js/plugins/flot/jquery.flot.symbol.js',
                'backend/js/plugins/flot/jquery.flot.time.js',
                'backend/js/plugins/sparkline/jquery.sparkline.min.js',
            ]
        ];
    }
}
