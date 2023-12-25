<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostCatalogueRequest;
use App\Http\Requests\UpdatePostCatalogueRequest;
use App\Http\Requests\DeletePostCatalogueRequest;
use Illuminate\Http\Request;
use App\Classes\Nestedsetbie;

use App\Services\Interfaces\PostCatalogueServiceInterface as PostCatalogueService;
use App\Repositories\Interfaces\PostCatalogueRepositoryInterface as PostCatalogueRepository;

class PostCatalogueController extends Controller
{
    protected $postCatalogueService;
    protected $postCatalogueRepository;
    protected $language;

    public function __construct(
        PostCatalogueService $postCatalogueService,
        PostCatalogueRepository $postCatalogueRepository,
    ) {
        $this->postCatalogueService = $postCatalogueService;
        $this->postCatalogueRepository = $postCatalogueRepository;
        $this->nestedset = new Nestedsetbie([
            'table'=> 'post_catalogues',
            'foreignkey' => 'post_catalogue_id',
            'language_id' => 1,
        ]);
        $this->language = $this->currentLanguage();
    }

    public function index(Request $request)
    {
        $this->authorize('modules', 'post.catalogue.index');
        $postCatalogues = $this->postCatalogueService->paginate($request);
        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
            ],
            'model' => 'PostCatalogue',
        ];
        $config['seo'] = __('messages.postCatalogue');
        $template = 'admin.post.catalogue.index';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'postCatalogues'
            )
        );
    }
    public function create()
    {
        $this->authorize('modules', 'post.catalogue.create');
        $config = $this->configData();
        $config['seo'] = config('apps.postcatalogue');
        $config['method'] = 'create';
        $dropdown = $this->nestedset->Dropdown();
        $template = 'admin.post.catalogue.store';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'dropdown',
            )
        );
    }

    public function store(StorePostCatalogueRequest $request)
    {
        if ($this->postCatalogueService->create($request)) {
            return redirect()->route('post.catalogue.index')->with('success', 'Thêm mới thành công!!');
        }
        return redirect()->route('dashboard.index')->with('error', 'Thêm mới không thành công!! Vui lòng thử lại');
    }

    public function edit($id)
    {
        $this->authorize('modules', 'post.catalogue.update');
        $postCatalogue = $this->postCatalogueRepository->getPostCatalogueById($id, $this->language);
        $config = $this->configData();
        $config['seo'] = config('apps.postcatalogue');
        $config['method'] = 'edit';
        $dropdown = $this->nestedset->Dropdown();
        $album = json_decode($postCatalogue->album);
        $template = 'admin.post.catalogue.store';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'dropdown',
                'postCatalogue',
                'album',
            )
        );
    }
    public function update($id, UpdatePostCatalogueRequest $request)
    {
        if ($this->postCatalogueService->update($id, $request)) {
            return redirect()->route('post.catalogue.index')
                ->with('success', 'Cập nhật thành công!!');
        }
        return redirect()->route('dashboard.index')
            ->with('error', 'Cập nhật không thành công!! Vui lòng thử lại');
    }

    public function delete($id)
    {
        $this->authorize('modules', 'post.catalogue.destroy');
        $config['seo'] = config('apps.postcatalogue');
        $postCatalogue = $this->postCatalogueRepository->getPostCatalogueById($id, $this->language);
        $template = 'admin.post.catalogue.delete';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'postCatalogue',
            )
        );
    }

    public function destroy($id, DeletePostCatalogueRequest $request)
    {
        if ($this->postCatalogueService->destroy($id)) {
            return redirect()->route('post.catalogue.index')
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
