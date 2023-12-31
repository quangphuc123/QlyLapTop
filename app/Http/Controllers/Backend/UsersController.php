<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository;
use App\Repositories\Interfaces\ProductCatalogueRepositoryInterface as ProductCatalogueRepository;
use App\Repositories\Interfaces\BrandRepositoryInterface as BrandRepository;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UpdateChangPassWordRequest;
use App\Http\Requests\ForgotPassWord;
use App\Http\Requests\StoreForgotRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Product;
use App\Models\Brand;
use RealRashid\SweetAlert\Facades\Aler;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\changePassword;


class UsersController extends Controller
{

    protected $userService;
    protected $provinceRepository;
    protected $userCatalogueRepository;
    protected $productCatalogueRepository;
    protected $brandRepository;
    protected $userRepository;

    public function __construct(
        UserService $userService,
        ProvinceRepository $provinceRepository,
        UserRepository $userRepository,
        UserCatalogueRepository $userCatalogueRepository,
        BrandRepository $brandRepository,
        ProductCatalogueRepository $productCatalogueRepository,
    ) {
        $this->userService = $userService;
        $this->provinceRepository = $provinceRepository;
        $this->userCatalogueRepository = $userCatalogueRepository;
        $this->productCatalogueRepository = $productCatalogueRepository;
        $this->brandRepository = $brandRepository;
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        // $this->authorize('modules', 'post.index');
        $users = $this->userService->paginate($request);
        $username = $this->userRepository->all();
        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
            ],
            'model' => 'User',
        ];
        $config['seo'] = config('apps.user');
        $template = 'admin.user.user.index';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'users',
                'username'
            )
        );
    }
    public function create()
    {
        // $this->authorize('modules', 'post.create');
        $provinces = $this->provinceRepository->all();
        $config = $config = $this->configData();
        $userCatalogues = $this->userCatalogueRepository->all();
        $config['seo'] = config('apps.user');
        $config['method'] = 'create';
        $template = 'admin.user.user.store';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'provinces',
                'userCatalogues',
            )
        );
    }

    public function store(StoreUserRequest $request)
    {
        if ($this->userService->create($request)) {
            return redirect()->route('user.index')->with('success', 'Thêm mới thành công!!');
        }
        return redirect()->route('dashboard.index')->with('error', 'Thêm mới không thành công!! Vui lòng thử lại');
    }

    public function edit($id)
    {
        // $this->authorize('modules', 'post.update');
        $user = $this->userRepository->findById($id);
        $userCatalogues = $this->userCatalogueRepository->all();
        $provinces = $this->provinceRepository->all();
        $config = $this->configData();

        $config['seo'] = config('apps.user');
        $config['method'] = 'edit';
        $template = 'admin.user.user.store';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'provinces',
                'user',
                'userCatalogues'
            )
        );
    }
    public function update($id, UpdateUserRequest $request)
    {
        if ($this->userService->update($id, $request)) {
            return redirect()->route('user.index')
                ->with('success', 'Cập nhật thành công!!');
        }
        return redirect()->route('dashboard.index')
            ->with('error', 'Cập nhật không thành công!! Vui lòng thử lại');
    }

    public function delete($id)
    {
        // $this->authorize('modules', 'post.destroy');
        $config['seo'] = config('apps.user');

        $user = $this->userRepository->findById($id);
        $template = 'admin.user.user.delete';
        return view(
            'admin.dashboard.admin-layout',
            compact(
                'template',
                'config',
                'user',
            )
        );
    }

    public function destroy($id)
    {
        if ($this->userService->destroy($id)) {
            return redirect()->route('user.index')
                ->with('success', 'Xóa tài khoản thành công');
        }
        return redirect()->route('dashboard.index')
            ->with('error', 'Xóa tài khoản không thành công');
    }

    public function homePage()
    {
        //session()->flush('cart');
        $brands = Brand::all();
        $carts = session()->get(key: 'cart');
        $productCatalogue = $this->productCatalogueRepository->all();
        $brand = $this->brandRepository->all();
        $lsProduct = Product::orderByDesc('id')->paginate(9);
        return view('user.home-page', compact('lsProduct', 'productCatalogue', 'carts', 'brands'));
    }
    public function loginRegister()
    {
        $brands = Brand::all();
        $carts = session()->get(key: 'cart');
        return view('user.auth.login-register', compact('carts', 'brands'));
    }

    //Xử lý đăng ký
    public function xuLyDangKy(RegisterRequest $request)
    {
        $usernameExist = User::where('name', $request->name)->count();
        if ($usernameExist > 0) {
            return redirect()->route('loginRegister')->with(['message' => "Tên tài khoản {$request->name} đã tồn tại"]);
        }
        $emailExist = User::where('email', $request->email)->count();
        if ($emailExist > 0) {
            return redirect()->route('loginRegister')->with(['message1' => "Email {$request->email} đã được sử dụng"]);
        }
        $taiKhoan = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'user_catalogue_id' => '3',
            'email' => $request->email,
        ]);
        if (!empty($taiKhoan)) {
            return redirect()->route('loginRegister')->with('success', 'Đăng kí tài khoản thành công');
        }
        #Thông báo thêm không thành công
        return redirect()->route('loginRegister')->with('error', 'Đăng kí tài khoản không thành công');
    }
    //Xử lý đăng nhập
    public function xuLyDangNhap(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials) && (Auth::user()->user_catalogue_id == 3)) {
            return redirect()->route('trang-chu')->with('success', 'Đăng nhập vào trang người dùng');
        } else if (Auth::attempt($credentials) && (Auth::user()->user_catalogue_id == 1)) {
            return redirect()->route('dashboard.index')->with('success', 'Đăng nhập vào trang Admin');
        }
        return redirect()->route('loginRegister')->with('success', 'Đăng nhập không thành công!!');
    }

    //Đăng xuất
    public function logOut()
    {
        Auth::logout();
        return redirect()->route('trang-chu');
    }

    //Thông tin tài khoản
    public function accountDetail(User $user)
    {
        $brands = Brand::all();
        $carts = session()->get(key: 'cart');
        $profile = $user::find(Auth::user()->id);
        return view('user.auth.account-detail', compact('profile', 'carts', 'brands'));
    }

    //Cập nhật thông tin tài khoản
    public function updateAccount(Request $request)
    {
        $profile = User::find(Auth::user()->id);
        if (empty($profile)) {
            return redirect()->route('account-detail')->with('error', 'Không tìm thấy người dùng với id = {$id}');
        }
        if ($request->name == null) {
            $profile->name = $profile->name;
        } else {
            $profile->name = $request->name;
        }
        if ($request->email == null) {
            $profile->email = $profile->email;
        } else {
            $profile->email = $request->email;
        }
        if ($request->address == null) {
            $profile->address = $profile->address;
        } else {
            $profile->address = $request->address;
        }
        if ($request->birthday == null) {
            $profile->birthday = $profile->birthday;
        } else {
            $profile->birthday = $request->birthday;
        }
        if ($request->phone == null) {
            $profile->phone = $profile->phone;
        } else {
            $profile->phone = $request->phone;
        }
        $profile->user_catalogue_id = $profile->user_catalogue_id;
        $profile->save();
        return redirect()->route('accountDetail')->with('success', 'Thông tin tài khoản đã được cập nhật');
    }

    //Đổi mật khẩu
    public function changePassword(UpdateChangPassWordRequest $request)
    {
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Mật khẩu cũ không đúng");
        }
        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("success", "Mật khẩu đã được thay đổi");
    }

    public function forgotPassword()
    {
        $brands = Brand::all();
        $carts = session()->get(key: 'cart');
        return view('user.auth.forgot-password', compact('carts', 'brands'));
    }

    public function changePasswordMail($id, $mail)
    {
        $carts = session()->get(key: 'cart');
        return view('user.auth.change-password-mail', compact('carts', 'id', 'mail'));
    }
    public function updateForgotPassword(ForgotPassword $request)
    {
        #Update the new Password
        User::find($request->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return redirect()->route('loginRegister')->with("success", "Mật khẩu đã được thay đổi");
    }

    public function sendMailForgotPassword(Request $request)
    {
        $checkExist = User::where('email', $request->email)->first();
        if (empty($checkExist)) {
            return back()->with('error', 'email khong ton tai');
        }
        Mail::to($checkExist->email)->send(new changePassword($checkExist));
        return back()->with('succes', 'Vui long kiem tra email');
    }

    public function showContact()
    {
        $brands = Brand::all();
        $carts = session()->get(key: 'cart');
        return view('user.auth.contact', compact('carts', 'brands'));
    }
    public function searchProduct(Request $req)
    {
        $keywords = $req->keyword;
        $carts = session()->get(key: 'cart');
        $productCatalogue = $this->productCatalogueRepository->all();
        $brands = $this->brandRepository->all();
        $search_product = Product::where('name', 'like', '%' . $keywords . '%')->get();
        return view('user.product.search', compact([
            'search_product',
            'productCatalogue',
            'carts',
            'brands'
        ]));
    }

    private function configData()
    {
        return [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend\library\location.js',
                'backend/plugins/ckfinder_2/ckfinder.js',
                'backend/library/finder.js',
            ],
        ];
    }
}
