<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $config = $this->config();

        $template = 'admin.dashboard.home.index';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config'
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
