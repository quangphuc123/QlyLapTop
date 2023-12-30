<?php

namespace App\Services;

use App\Services\Interfaces\BaseServiceInterface;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interfaces\RouterRepositoryInterface as RouterRepository;



/**
 * Class BaseService
 * @package App\Services
 */
class BaseService implements BaseServiceInterface
{
    protected $routerRepository;
    protected $controllerName;
    public function __construct(
        RouterRepository $routerRepository,
    ) {
        $this->routerRepository = $routerRepository;
    }
    public function currentLanguage(){
        return 1;
    }
    public function formatAlbum($request){
        return ($request->input('album') && !empty($request->input('album'))) ? json_encode($request->input('album')) : '';
    }
    public function nestedset(){
        $this->nestedset->Get('level ASC', 'oder ASC'); // cái này để lấy dữ liệu
        $this->nestedset->Recursive(0, $this->nestedset->Set()); //tính toán các giá trị left right
        $this->nestedset->Action(); // cập nhật lại các giá trị left rigth
    }
    public function formatRouterPayload($model, $request, $controllerName){
        $router = [
            'canonical' => $request->input('canonical'),
            'module_id' => $model->id,
            'controllers' => 'App\Http\Controllers\Frontend\\'.$controllerName.'',
        ];
        return $router;
    }
    public function createRouter($model, $request,$controllerName){
        $router = $this->formatRouterPayload($model, $request, $controllerName);
        $this->routerRepository->create($router);
    }
    public function updateRouter($model, $request, $controllerName){
        $payload = $this->formatRouterPayload($model, $request, $controllerName);
        $condition = [
            ['module_id','=', $model->id],
            ['controllers','=', 'App\Http\Controllers\Frontend\\'.$controllerName,],
        ];
        $router = $this->routerRepository->findByCondition($condition);
        $res = $this->routerRepository->update($router->id, $payload);
        return $res;
    }
}
