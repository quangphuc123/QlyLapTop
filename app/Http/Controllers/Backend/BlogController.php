<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use App\Http\Controllers\Controller;
use App\Models\CommentPost;
use App\Models\Post;
use App\Models\ProductCatalogue;
use Illuminate\Http\Request;
use App\Services\Interfaces\PostServiceInterface as PostService;
use App\Repositories\Interfaces\PostRepositoryInterface as PostRepository;



class BlogController extends Controller
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
        $this->language = $this->currentLanguage();
    }
    public function showBlog(Request $request)
    {
        $lsPost = $this->postService->paginate($request);
        $carts = session()->get(key: 'cart');
        return view('user.blog.blog', compact([
            'carts',
            'lsPost',
        ]));
    }
    public function blogDetail($id)
    {
        $comments = CommentPost::orderByDesc('id')->paginate(4);
        $carts = session()->get(key: 'cart');
        $blog = $this->postRepository->getPostById($id, $this->language);
        return view('user.blog.blog-detail', compact('blog', 'carts', 'comments'));
    }
}
