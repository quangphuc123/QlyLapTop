<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use Illuminate\Http\Request;

use App\Services\Interfaces\OrderDetailServiceInterface as OrderDetailService;
use App\Repositories\Interfaces\OrderDetailRepositoryInterface as OrderDetailRepository;

class OrderDetailController extends Controller
{
    protected $orderDetailService;
    protected $orderDetailRepository;

    public function __construct(
        OrderDetailService $orderDetailService,
        OrderDetailRepository $orderDetailRepository,
    ) {
        $this->orderDetailService = $orderDetailService;
        $this->orderDetailRepository = $orderDetailRepository;
    }

    public function index(Request $request)
    {
        $orderdetails = $this->orderDetailService->paginate($request);
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
                'orderdetails',
            )
        );
    }

    public function edit($id)
    {
        // $this->authorize('modules', 'brand.update');
        $orderDetail = $this->orderDetailRepository->findById($id);
        $config = $this->configData();
        $config['seo'] = config('apps.order');
        $config['method'] = 'edit';
        $template = 'admin.order.detail.store';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'orderDetail',
            )
        );
    }
    public function update($id, UpdateOrderDetailRequest $request)
    {
        if ($this->orderDetailService->update($id, $request)) {
            return redirect()->route('brand.index')
                ->with('success', 'Cập nhật thành công!!');
        }
        return redirect()->route('dashboard.index')
            ->with('error', 'Cập nhật không thành công');
    }

    public function delete($id)
    {
        // $this->authorize('modules', 'order.detail.destroy');

        $config['seo'] = config('apps.order');
        $orderDetail = $this->orderDetailRepository->findById($id);
        $template = 'admin.order.detail.delete';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'orderDetail',
            )
        );
    }

    public function destroy($id)
    {
        if ($this->orderDetailService->destroy($id)) {
            return redirect()->route('order.detail.index')
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
