<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductCatalogueRequest;
use App\Http\Requests\UpdateProductCatalogueRequest;
use App\Http\Requests\DeleteProductCatalogueRequest;
use Illuminate\Http\Request;

use App\Services\Interfaces\ProductCatalogueServiceInterface as ProductCatalogueService;
use App\Repositories\Interfaces\ProductCatalogueRepositoryInterface as ProductCatalogueRepository;

class ProductCatalogueController extends Controller
{
    protected $productCatalogueService;
    protected $productCatalogueRepository;

    public function __construct(
        ProductCatalogueService $productCatalogueService,
        ProductCatalogueRepository $productCatalogueRepository,
    ) {
        $this->productCatalogueService = $productCatalogueService;
        $this->productCatalogueRepository = $productCatalogueRepository;
    }

    public function index(Request $request)
    {
        // $this->authorize('modules', 'product.catalogue.index');
        $productCatalogues = $this->productCatalogueService->paginate($request);
        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
            ],
            'model' => 'ProductCatalogue',
        ];
        $config['seo'] =  config('apps.productCatalogue');
        $template = 'admin.product.catalogue.index';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'productCatalogues'
            )
        );
    }
    public function create()
    {
        // $this->authorize('modules', 'product.catalogue.create');
        $config = $this->configData();
        $config['seo'] = config('apps.productCatalogue');
        $config['method'] = 'create';
        $template = 'admin.product.catalogue.store';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
            )
        );
    }

    public function store(StoreProductCatalogueRequest $request)
    {
        if ($this->productCatalogueService->create($request)) {
            return redirect()->route('product.catalogue.index')->with('success', 'Thêm mới thành công!!');
        }
        return redirect()->route('dashboard.index')->with('error', 'Thêm mới không thành công!! Vui lòng thử lại');
    }

    public function edit($id)
    {
        // $this->authorize('modules', 'product.catalogue.update');
        $productCatalogue = $this->productCatalogueRepository->findById($id);
        $config = $this->configData();
        $config['seo'] = config('apps.productCatalogue');
        $config['method'] = 'edit';
        $template = 'admin.product.catalogue.store';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'productCatalogue',
            )
        );
    }
    public function update($id, UpdateProductCatalogueRequest $request)
    {
        if ($this->productCatalogueService->update($id, $request)) {
            return redirect()->route('product.catalogue.index')
                ->with('success', 'Cập nhật thành công!!');
        }
        return redirect()->route('dashboard.index')
            ->with('error', 'Cập nhật không thành công');
    }

    public function delete($id)
    {
        // $this->authorize('modules', 'product.catalogue.destroy');
        $config['seo'] = config('apps.productCatalogue');
        $template = 'admin.product.catalogue.delete';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
            )
        );
    }

    public function destroy($id, DeleteProductCatalogueRequest $request)
    {
        if ($this->productCatalogueService->destroy($id)) {
            return redirect()->route('product.catalogue.index')
                ->with('success', 'Xóa loại sản phẩm thành công');
        }
        return redirect()->route('dashboard.index')
            ->with('error', 'Xóa loại sản phẩm không thành công');
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
