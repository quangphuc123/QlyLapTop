<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Http\Requests\DeleteBrandRequest;
use Illuminate\Http\Request;

use App\Services\Interfaces\BrandServiceInterface as BrandService;
use App\Repositories\Interfaces\BrandRepositoryInterface as BrandRepository;

class BrandController extends Controller
{
    protected $brandService;
    protected $brandRepository;

    public function __construct(
        BrandService $brandService,
        BrandRepository $brandRepository,
    ) {
        $this->brandService = $brandService;
        $this->brandRepository = $brandRepository;
    }

    public function index(Request $request)
    {
        // $this->authorize('modules', 'brand.index');
        $brands = $this->brandService->paginate($request);
        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
            ],
            'model' => 'Brand',
        ];
        $config['seo'] =  config('apps.brand');
        $template = 'admin.brand.index';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'brands'
            )
        );
    }
    public function create()
    {
        // $this->authorize('modules', 'brand.create');
        $config = $this->configData();
        $config['seo'] = config('apps.brand');
        $config['method'] = 'create';
        $template = 'admin.brand.store';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
            )
        );
    }

    public function store(StoreBrandRequest $request)
    {
        if ($this->brandService->create($request)) {
            return redirect()->route('brand.index')->with('success', 'Thêm mới thành công!!');
        }
        return redirect()->route('dashboard.index')->with('error', 'Thêm mới không thành công!! Vui lòng thử lại');
    }

    public function edit($id)
    {
        // $this->authorize('modules', 'brand.update');
        $brand = $this->brandRepository->findById($id);
        $config = $this->configData();
        $config['seo'] = config('apps.brand');
        $config['method'] = 'edit';
        $template = 'admin.brand.store';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'brand',
            )
        );
    }
    public function update($id, UpdateBrandRequest $request)
    {
        if ($this->brandService->update($id, $request)) {
            return redirect()->route('brand.index')
                ->with('success', 'Cập nhật thành công!!');
        }
        return redirect()->route('dashboard.index')
            ->with('error', 'Cập nhật không thành công');
    }

    public function delete($id)
    {
        // $this->authorize('modules', 'brand.destroy');
        $config['seo'] = config('apps.brand');
        $brand = $this->brandRepository->findById($id);
        $template = 'admin.brand.delete';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'brand'
            )
        );
    }

    public function destroy($id, Request $request)
    {
        if ($this->brandService->destroy($id)) {
            return redirect()->route('brand.index')
                ->with('success', 'Xóa loại thương hiệu thành công');
        }
        return redirect()->route('dashboard.index')
            ->with('error', 'Xóa loại thương hiệu không thành công');
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
