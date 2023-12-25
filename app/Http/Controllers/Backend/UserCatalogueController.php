<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserCatalogueRequest;
use Illuminate\Http\Request;

use App\Http\Requests\UpdateUserRequest;

use App\Services\Interfaces\UserCatalogueServiceInterface as UserCatalogueService;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository;
use App\Repositories\Interfaces\PermissionRepositoryInterface as PermissionRepository;

class UserCatalogueController extends Controller
{

    protected $userCatalogueService;
    protected $userCatalogueRepository;
    protected $permissionRepository;

    public function __construct(
        UserCatalogueService $userCatalogueService,
        UserCatalogueRepository $userCatalogueRepository,
        PermissionRepository  $permissionRepository,
    ) {
        $this->userCatalogueService = $userCatalogueService;
        $this->userCatalogueRepository = $userCatalogueRepository;
        $this->permissionRepository = $permissionRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('modules', 'post.catalogue.index');
        $userCatalogues = $this->userCatalogueService->paginate($request);

        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
            ],
            'model' => 'UserCatalogue',
        ];
        $config['seo'] = config('apps.usercatalogue');
        $template = 'admin.user.catalogue.index';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'userCatalogues'
            )
        );
    }
    public function create()
    {
        $this->authorize('modules', 'post.catalogue.create');
        $config['seo'] = config('apps.usercatalogue');
        $config['method'] = 'create';
        $template = 'admin.user.catalogue.store';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
            )
        );
    }

    public function store(StoreUserCatalogueRequest $request)
    {
        if ($this->userCatalogueService->create($request)) {
            return redirect()->route('user.catalogue.index')->with('success', 'Thêm mới thành công!!');
        }
        return redirect()->route('dashboard.index')->with('error', 'Thêm mới không thành công!! Vui lòng thử lại');
    }

    public function edit($id)
    {
        $this->authorize('modules', 'post.catalogue.update');

        $userCatalogue = $this->userCatalogueRepository->findById($id);
        $config['seo'] = config('apps.usercatalogue');
        $config['method'] = 'edit';
        $template = 'admin.user.catalogue.store';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'userCatalogue',
            )
        );
    }
    public function update($id, StoreUserCatalogueRequest $request)
    {
        if ($this->userCatalogueService->update($id, $request)) {
            return redirect()->route('user.catalogue.index')
                ->with('success', 'Cập nhật thành công!!');
        }
        return redirect()->route('dashboard.index')
            ->with('error', 'Cập nhật không thành công!! Vui lòng thử lại');
    }

    public function delete($id)
    {
        $this->authorize('modules', 'post.catalogue.destroy');

        $config['seo'] = config('apps.usercatalogue');
        $userCatalogue = $this->userCatalogueRepository->findById($id);
        $template = 'admin.user.catalogue.delete';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'userCatalogue',
            )
        );
    }

    public function destroy($id)
    {
        if ($this->userCatalogueService->destroy($id)) {
            return redirect()->route('user.catalogue.index')
                ->with('success', 'Xóa nhóm tài khoản thành công');
        }
        return redirect()->route('dashboard.index')
            ->with('error', 'Xóa nhóm tài khoản không thành công');
    }

    public function permission(){
        $this->authorize('modules', 'post.catalogue.permission');
        $userCatalogues = $this->userCatalogueRepository->all(['permissions']);
        $permissions = $this->permissionRepository->all();
        $template = 'admin.user.catalogue.permission';
        $config['seo'] = config('apps.usercatalogue');
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'userCatalogues',
                'permissions',
            )
        );
    }
    public function updatePermission(Request $request){
        if($this->userCatalogueService->setPermission($request)){
            return redirect()->route('user.catalogue.index')
                ->with('success', 'Cập nhật quyền thành công');
        }
        return redirect()->route('dashboard.index')
            ->with('error', 'Cập nhật quyền không thành công');
    }
}
