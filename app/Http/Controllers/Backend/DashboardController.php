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

        $resultUser = DB::table('user_catalogues')
            ->select('user_catalogues.*', DB::raw('COUNT(users.user_catalogue_id) AS number_user'))
            ->join('users', 'user_catalogues.id', '=', 'users.user_catalogue_id')
            ->groupBy(array_merge(['user_catalogues.id'], $tableColumnUsers))
            ->get();
        $totalOrders = Order::count();
        $totalUsers = User::count();
        $orders = Order::latest()->limit(5)->get();
        $totalIncome = Order::sum('order_total');
        $template = 'admin.dashboard.home.index';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'result',
                'resultUser',
                'totalOrders',
                'totalUsers',
                'orders',
                'totalIncome'
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
