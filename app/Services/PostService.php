<?php

namespace App\Services;

use App\Services\Interfaces\PostServiceInterface;
use App\Services\BaseService;
use App\Repositories\Interfaces\PostRepositoryInterface as PostRepository;
use App\Repositories\Interfaces\RouterRepositoryInterface as RouterRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



/**
 * Class PostService
 * @package App\Services
 */
class PostService extends BaseService implements PostServiceInterface
{
    protected $postRepository;
    protected $language;
    protected $routerRepository;
    public function __construct(
        PostRepository $postRepository,
        RouterRepository $routerRepository,
    ) {
        $this->language = $this->currentLanguage();
        $this->postRepository = $postRepository;
        $this->routerRepository = $routerRepository;
        $this->controllerName = 'PostController';
    }
    public function paginate($request)
    {
        $condition['keyword'] = addslashes($request->input('keyword'));
        $condition['publish'] = $request->integer('publish');
        $condition['where'] = [
            ['tb2.language_id', '=', $this->language],
        ];
        $perPage = $request->integer('perpage');
        $posts = $this->postRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => 'post.index', 'groupBy' => $this->paginateSelect()],
            ['posts.id', 'DESC'],
            [
                ['post_language as tb2','tb2.post_id', '=','posts.id' ],
                ['post_catalogue_post as tb3','posts.id', '=','tb3.post_id' ],
            ],
            ['post_catalogues'],
            $this->whereRaw($request),
        );
        return $posts;
    }
    public function create($request){
        DB::beginTransaction();
        try {
            $post = $this->createPost($request);
            dd($post);
            if($post->id > 0){
                $this->updateLanguageForPost($post, $request);
                $this->updateCatalogueForPost($post, $request);
                $this->createRouter(
                    $post, $request,$this->controllerName
                );
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();
            die();
            return false;
        }
    }
    public function update($id, $request)
    {
        DB::beginTransaction();
        try {
            $post = $this->postRepository->findById($id);
            if($this->uploadPost($post, $request)){
                $this->updateLanguageForPost($post, $request);
                $this->updateCatalogueForPost($post, $request);
                $this->updateRouter(
                    $post, $request,$this->controllerName
                );
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();
            die();
            return false;
        }
    }
    private function createPost($request) {
        $payload = $request->only($this->payload());
        $payload['album'] = $this->formatAlbum($request);
        $payload['user_id'] = Auth::id();
        $post = $this->postRepository->create($payload);
            return $post;
    }
    private function uploadPost($post, $request){
        $payload = $request->only($this->payload());
        $payload['album'] = $this->formatAlbum($request);
        return $this->postRepository->update($post->id, $payload);
    }
    private function updateLanguageForPost($post, $request){
        $payload = $request->only($this->payloadLanguage());
        $payload = $this->formatLanguagePayload($payload, $post->id);
        $post->languages()->detach($this->language);
        return $this->postRepository->createPivot($post, $payload,'languages');
    }
    private function updateCatalogueForPost($post, $request){
        $post->post_catalogues()->sync($this->catalogue($request));
    }
    private function formatLanguagePayload($payload, $postId){
        $payload['canonical'] = Str::slug( $payload['canonical']);
        $payload['language_id'] = $this->language;
        $payload['post_id'] = $postId;
        return $payload;
    }
    private function catalogue($request){
        if($request->input('catalogue') != null){
            return array_unique(array_merge($request->input('catalogue'),[$request->post_catalogue_id]));
        }
        return [$request->post_catalogue_id];

    }
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $post = $this->postRepository->delete($id);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();
            die();
            return false;
        }
    }
    public function updateStatus($post = [])
    {
        DB::beginTransaction();
        try {

            $payload[$post['field']] = (($post['value'] == 1) ? 2 : 1);
            $post = $this->postRepository->update($post['modelId'], $payload);
            // $this->changeUserStatus($post, $payload[$post['field']]);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();
            die();
            return false;
        }
    }
    public function updateStatusAll($post)
    {
        DB::beginTransaction();
        try {

            $payload[$post['field']] = $post['value'];
            $flag = $this->postRepository->updateByWhereIn('id', $post['id'], $payload);
            // $this->changeUserStatus($post, $post['value']);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();
            die();
            return false;
        }
    }
    private function whereRaw($request){
        $rawCondition = [];
        if($request->integer('post_catalogue_id') > 0 ){
            $rawCondition['whereRaw'] = [
                [
                    'tb3.post_catalogue_id IN (
                    SELECT id
                    FROM post_catalogues
                    WHERE lft >= (SELECT lft FROM post_catalogues as pc WHERE pc.id = ?)
                    AND rgt <= (SELECT rgt FROM post_catalogues as pc WHERE pc.id = ?)
                )',
                [$request->integer('post_catalogue_id'), $request->integer('post_catalogue_id')]
                ]
            ];
        }
        return $rawCondition;
    }
    private function paginateSelect()
    {
        return [
            'posts.id',
            'posts.publish',
            'posts.image',
            'posts.oder',
            'tb2.name',
            'tb2.canonical',
        ];
    }
    private function payload(){
        return [
            'follow',
            'publish',
            'image',
            'album',
            'post_catalogue_id',
        ];
    }
    private function payloadLanguage(){
        return [
            'name',
            'description',
            'content',
            'meta_title',
            'meta_keyword',
            'meta_description',
            'canonical',
        ];

    }
}
