<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductCatalogueRequest;
use App\Http\Requests\UpdateProductCatalogueRequest;
use App\Http\Requests\DeleteProductCatalogueRequest;
use App\Models\Product;

use Illuminate\Http\Request;

use App\Services\Interfaces\ProductCatalogueServiceInterface as ProductCatalogueService;
use App\Repositories\Interfaces\ProductCatalogueRepositoryInterface as ProductCatalogueRepository;
use App\Repositories\Interfaces\ProductRepositoryInterface as ProductRepository;
use App\Repositories\Interfaces\BrandRepositoryInterface as BrandRepository;

class ProductCatalogueController extends Controller
{
    protected $productCatalogueService;
    protected $productCatalogueRepository;
    protected $brandRepository;
    protected $productRepository;


    public function __construct(
        ProductCatalogueService $productCatalogueService,
        ProductCatalogueRepository $productCatalogueRepository,
        ProductRepository $productRepository,
        BrandRepository $brandRepository,
    ) {
        $this->productCatalogueService = $productCatalogueService;
        $this->productCatalogueRepository = $productCatalogueRepository;
        $this->brandRepository = $brandRepository;
        $this->productRepository = $productRepository;
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
        $productCatalogue = $this->productCatalogueRepository->findById($id);
        $template = 'admin.product.catalogue.delete';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'productCatalogue'
            )
        );
    }

    public function destroy($id, Request $request)
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

    public function show_product_catalogue($id){
        $lsProduct= $this->productRepository->findById($id);
        $brand = $this->brandRepository->all();
        $productcatalogue_id = Product::find($id)->join('product_catalogues as tb1',
        'products.product_catalogue_id','=','tb1.id')->where('products.product_catalogue_id',$id)->get();
        return view('user.product.show-category',compact(
            'productcatalogue_id',
            'lsProduct',
            'brand',
        ));
    }

    public function show_brand_catalogue($id){
        $lsProduct= $this->productRepository->findById($id);
        $productCatalogue = $this->productCatalogueRepository->all();
        $brand_id = Product::find($id)->join('brands as tb1',
        'products.brand_id','=','tb1.id')->where('products.brand_id',$id)->get();
        return view('user.product.show-brand',compact(
            'productCatalogue',
            'lsProduct',
            'brand_id',
        ));
    }
}
