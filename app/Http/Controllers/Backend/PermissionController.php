<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use Illuminate\Http\Request;

use App\Services\Interfaces\PermissionServiceInterface as PermissionService;
use App\Repositories\Interfaces\PermissionRepositoryInterface as PermissionRepository;

class PermissionController extends Controller
{
    protected $permissionService;
    protected $permissionRepository;

    public function __construct(
        PermissionService $permissionService,
        PermissionRepository $permissionRepository,
    ) {
        $this->permissionService = $permissionService;
        $this->permissionRepository = $permissionRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('modules', 'permission.index');
        $permissions = $this->permissionService->paginate($request);

        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
            ],
            'model' => 'Permission',
        ];
        $config['seo'] = config('apps.permission');
        $template = 'admin.permission.index';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'permissions'
            )
        );
    }
    public function create()
    {
        $this->authorize('modules', 'permission.create');
        $config = $this->configData();
        $config['seo'] = config('apps.permission');
        $config['method'] = 'create';
        $template = 'admin.permission.store';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
            )
        );
    }

    public function store(StorePermissionRequest $request)
    {
        if ($this->permissionService->create($request)) {
            return redirect()->route('permission.index')->with('success', 'Thêm mới thành công!!');
        }
        return redirect()->route('dashboard.index')->with('error', 'Thêm mới không thành công!! Vui lòng thử lại');
    }

    public function edit($id)
    {
        $this->authorize('modules', 'permission.update');

        $permission = $this->permissionRepository->findById($id);
        $config = $this->configData();
        $config['seo'] = config('apps.permission');
        $config['method'] = 'edit';
        $template = 'admin.permission.store';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'permission',
            )
        );
    }
    public function update($id, UpdatePermissionRequest $request)
    {

        if ($this->permissionService->update($id, $request)) {
            return redirect()->route('permission.index')
                ->with('success', 'Cập nhật thành công!!');
        }
        return redirect()->route('dashboard.index')
            ->with('error', 'Cập nhật không thành công!! Vui lòng thử lại');
    }

    public function delete($id)
    {
        $this->authorize('modules', 'permission.destroy');
        $config['seo'] = config('apps.permission');
        $permission = $this->permissionRepository->findById($id);
        $template = 'admin.permission.delete';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'permission',
            )
        );
    }

    public function destroy($id)
    {
        if ($this->permissionService->destroy($id)) {
            return redirect()->route('permission.index')
                ->with('success', 'Xóa nhóm tài khoản thành công');
        }
        return redirect()->route('dashboard.index')
            ->with('error', 'Xóa nhóm tài khoản không thành công');
    }

    private function configData()
    {
        return [

        ];
    }
}
