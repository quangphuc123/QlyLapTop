<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\DeletePostRequest;
use Illuminate\Http\Request;
use App\Classes\Nestedsetbie;

use App\Services\Interfaces\PostServiceInterface as PostService;
use App\Repositories\Interfaces\PostRepositoryInterface as PostRepository;

class PostController extends Controller
{
    protected $postService;
    protected $postRepository;
    protected $language;

    public function __construct(
        PostService $postService,
        PostRepository $postRepository,
    ) {
        $this->postService = $postService;
        $this->postRepository = $postRepository;
        $this->nestedset = new Nestedsetbie([
            'table'=> 'post_catalogues',
            'foreignkey' => 'post_catalogue_id',
            'language_id' => 1,
        ]);
        $this->language = $this->currentLanguage();
    }

    public function index(Request $request)
    {
        $this->authorize('modules', 'post.index');
        $posts = $this->postService->paginate($request);
        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
            ],
            'model' => 'Post',
        ];
        $config['seo'] = config('apps.post');
        $template = 'admin.post.post.index';
        $dropdown = $this->nestedset->Dropdown();
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'posts',
                'dropdown',
            )
        );
    }
    public function create()
    {
        $this->authorize('modules', 'post.create');

        $config = $this->configData();
        $config['seo'] = config('apps.post');
        $config['method'] = 'create';
        $dropdown = $this->nestedset->Dropdown();
        $template = 'admin.post.post.store';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'dropdown',
            )
        );
    }

    public function store(StorePostRequest $request)
    {
        if ($this->postService->create($request)) {
            return redirect()->route('post.index')->with('success', 'Thêm mới thành công!!');
        }
        return redirect()->route('dashboard.index')->with('error', 'Thêm mới không thành công!! Vui lòng thử lại');
    }

    public function edit($id)
    {
        $this->authorize('modules', 'post.update');

        $post = $this->postRepository->getPostById($id, $this->language);
        $config = $this->configData();
        $config['seo'] = config('apps.post');
        $config['method'] = 'edit';
        $dropdown = $this->nestedset->Dropdown();
        $album = json_decode($post->album);
        $template = 'admin.post.post.store';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'dropdown',
                'post',
                'album',
            )
        );
    }
    public function update($id, UpdatePostRequest $request)
    {
        if ($this->postService->update($id, $request)) {
            return redirect()->route('post.index')
                ->with('success', 'Cập nhật thành công!!');
        }
        return redirect()->route('dashboard.index')
            ->with('error', 'Cập nhật không thành công!! Vui lòng thử lại');
    }

    public function delete($id)
    {
        $this->authorize('modules', 'post.destroy');

        $config['seo'] = config('apps.post');
        $post = $this->postRepository->getPostById($id, $this->language);
        $template = 'admin.post.post.delete';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'post',
            )
        );
    }

    public function destroy($id)
    {
        if ($this->postService->destroy($id)) {
            return redirect()->route('post.index')
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
