<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\Interfaces\ProductServiceInterface as ProductService;
use App\Repositories\Interfaces\ProductCatalogueRepositoryInterface as ProductCatalogueRepository;
use App\Repositories\Interfaces\ProductRepositoryInterface as ProductRepository;

class ProductController extends Controller
{
    public function productDetail($id){
        $detail=Product::find($id);
        return view('product-detail',compact('detail'));
    }
    
    protected $productService;
    protected $productCatalogueRepository;
    protected $productRepository;

    public function __construct(
        ProductService $productService,
        ProductRepository $productRepository,
        ProductCatalogueRepository $productCatalogueRepository,
    ) {
        $this->productService = $productService;
        $this->productCatalogueRepository = $productCatalogueRepository;
        $this->productRepository = $productRepository;
    }
    public function index(Request $request)
    {
        // $this->authorize('modules', 'post.index');
        $products = $this->productService->paginate($request);
        $productCatalogue = $this->productRepository->all();
        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
            ],
            'model' => 'Product',
        ];
        $config['seo'] = config('apps.product');
        $template = 'admin.product.product.index';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'products',
                'productCatalogue',

            )
        );
    }
    public function create()
    {
        // $this->authorize('modules', 'post.create');
        $config = $config = $this->configData();
        $productCatalogues = $this->productCatalogueRepository->all();
        $config['seo'] = config('apps.product');
        $config['method'] = 'create';
        $template = 'admin.product.product.store';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'productCatalogues',
            )
        );
    }
    public function store(StoreProductRequest $request)
    {
        if ($this->productService->create($request)) {
            return redirect()->route('product.index')->with('success', 'Thêm mới thành công!!');
        }
        return redirect()->route('dashboard.index')->with('error', 'Thêm mới không thành công!! Vui lòng thử lại');
    }
    public function edit($id)
    {
        // $this->authorize('modules', 'post.update');
        $product = $this->productRepository->findById($id);
        $productCatalogues = $this->productCatalogueRepository->all();
        $config = $this->configData();
        $config['seo'] = config('apps.product');
        $config['method'] = 'edit';
        $album = json_decode($product->album);
        $template = 'admin.product.product.store';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'product',
                'productCatalogues',
                'album',
            )
        );
    }
    public function update($id, UpdateProductRequest $request)
    {
        if ($this->productService->update($id, $request)) {
            return redirect()->route('product.index')
                ->with('success', 'Cập nhật thành công');
        }
        return redirect()->route('dashboard.index')
            ->with('error', 'Cập nhật không thành công');
    }
    public function delete($id)
    {
        // $this->authorize('modules', 'post.destroy');
        $config['seo'] = config('apps.product');
        $product = $this->productRepository->findById($id);
        $template = 'admin.product.product.delete';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'product',
            )
        );
    }
    public function destroy($id)
    {
        if ($this->productService->destroy($id)) {
            return redirect()->route('product.index')
                ->with('success', 'Xóa sản phẩm thành công');
        }
        return redirect()->route('dashboard.index')
            ->with('error', 'Xóa sản phẩm không thành công');
    }
    private function configData()
    {
        return [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
            ],
            'js' => [
                'backend/plugins/ckeditor/ckeditor.js',
                'backend/plugins/ckfinder_2/ckfinder.js',
                'backend/library/finder.js',
                'backend/library/seo.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            ],
        ];
    }
}
