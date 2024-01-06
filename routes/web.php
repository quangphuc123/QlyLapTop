<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ajax\LocationController;
use App\Http\Controllers\Ajax\DashboardController as AjaxDashBoardController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Backend\LanguageController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\UserCatalogueController;
use App\Http\Controllers\Backend\PostCatalogueController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CartController;
use App\Http\Controllers\Backend\ProductCatalogueController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\PaymentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//FONTEND

Route::get('/',[UsersController::class,'homePage'])->name('trang-chu');
Route::get('login-register',[UsersController::class,'loginRegister'])->name('loginRegister')->middleware('guest');
Route::post('xl-dang-ky',[UsersController::class,'xuLyDangKy'])->name('xl-dang-ky')->middleware('guest');
Route::post('/',[UsersController::class,'xuLyDangNhap'])->name('xl-dang-nhap')->middleware('guest');
Route::get('dang-xuat',[UsersController::class,'logOut'])->name('logOut')->middleware('auth');
Route::get('quen-mat-khau',[UsersController::class,'forgotPassword'])->name('forgotPassword');
Route::post('gui-mail',[UsersController::class,'sendMailForgotPassword'])->name('sendMail');
Route::get('change-password-mail/{id}/{mail}',[UsersController::class,'changePasswordMail'])->name('changePasswordMail');
Route::post('forgot-password',[UsersController::class,'updateForgotPassword'])->name('xl-forgot-password');
Route::get('thong-tin-tai-khoan',[UsersController::class,'accountDetail'])->name('accountDetail');
Route::post('cap-nhat',[UsersController::class,'updateAccount'])->name('xl-cap-nhat');
Route::post('cap-nhat-mat-khau',[UsersController::class,'changePassword'])->name('xl-cap-nhat-mat-khau');


Route::get('/',[UsersController::class,'homePage'])->name('trang-chu');
Route::get('/chi-tiet-san-pham/{id}',[ProductController::class,'productDetail'])->name('chi-tiet-san-pham');

Route::get('/cart',[CartController::class,'showCart'])->name('cart-view');
Route::post('/cart',[CartController::class,'showCart'])->name('cart-view');
//Route::get('/add/{product}',[CartController::class,'addToCart'])->name('cart-add');
Route::get('/add/{id}',[CartController::class,'addToCart'])->name('cart-add');
Route::get('/update-cart',[CartController::class,'updateCart'])->name('update-cart');
Route::get('/delete-cart',[CartController::class,'deleteCart'])->name('delete-cart');
Route::get('/delete-cart-all',[CartController::class,'deleteCartAll'])->name('delete-cart-all');
Route::get('/thanh-toan',[CartController::class,'checkOut'])->name('check-out');

Route::get('/wishlist',[ProductController::class,'showWishlist'])->name('show-wishlist');
Route::post('/add-wishlist',[ProductController::class,'addToWishlist'])->name('add-wishlist');
Route::post('/delete-wishlist',[ProductController::class,'deleteToWishlist'])->name('delete-wishlist');

Route::get('/lien-he',[UsersController::class,'showContact'])->name('contact');

//cổng thanh toán
Route::post('/vnpay_payment',[PaymentController::class,'vnpay_payment'])->name('pay.vnpay');



//Quên mật khẩu


//BACKEND
Route::group(['middleware' => ['admin', 'locale']],function () {

    Route::get('dashboard/index', [DashboardController::class, 'index'])
        ->name('dashboard.index');
    //USER
    Route::group(['prefix' => 'user'], function () {

        Route::get('index', [UsersController::class, 'index'])
            ->name('user.index');
        Route::get('create', [UsersController::class, 'create'])
            ->name('user.create');
        Route::post('store', [UsersController::class, 'store'])
            ->name('user.store');
        Route::get('edit/{id}', [UsersController::class, 'edit'])->where(['id' => '[0-9]+'])
            ->name('user.edit');
        Route::post('update/{id}', [UsersController::class, 'update'])->where(['id' => '[0-9]+'])
            ->name('user.update');
        Route::get('delete/{id}', [UsersController::class, 'delete'])->where(['id' => '[0-9]+'])
            ->name('user.delete');
        Route::delete('destroy/{id}', [UsersController::class, 'destroy'])->where(['id' => '[0-9]+'])
            ->name('user.destroy');
    });

    Route::group(['prefix' => 'user/catalogue'], function () {

        Route::get('index', [UserCatalogueController::class, 'index'])
            ->name('user.catalogue.index');
        Route::get('create', [UserCatalogueController::class, 'create'])
            ->name('user.catalogue.create');
        Route::post('store', [UserCatalogueController::class, 'store'])
            ->name('user.catalogue.store');
        Route::get('edit/{id}', [UserCatalogueController::class, 'edit'])->where(['id' => '[0-9]+'])
            ->name('user.catalogue.edit');
        Route::post('update/{id}', [UserCatalogueController::class, 'update'])->where(['id' => '[0-9]+'])
            ->name('user.catalogue.update');
        Route::get('delete/{id}', [UserCatalogueController::class, 'delete'])->where(['id' => '[0-9]+'])
            ->name('user.catalogue.delete');
        Route::delete('destroy/{id}', [UserCatalogueController::class, 'destroy'])->where(['id' => '[0-9]+'])
            ->name('user.catalogue.destroy');

        Route::get('permission', [UserCatalogueController::class, 'permission'])
            ->name('user.catalogue.permission');
        Route::post('updatePermission', [UserCatalogueController::class, 'updatePermission'])
            ->name('user.catalogue.updatePermission');
    });

    Route::group(['prefix' => 'language'], function () {

        Route::get('index', [LanguageController::class, 'index'])
            ->name('language.index');
        Route::get('create', [LanguageController::class, 'create'])
            ->name('language.create');
        Route::post('store', [LanguageController::class, 'store'])
            ->name('language.store');
        Route::get('edit/{id}', [LanguageController::class, 'edit'])->where(['id' => '[0-9]+'])
            ->name('language.edit');
        Route::post('update/{id}', [LanguageController::class, 'update'])->where(['id' => '[0-9]+'])
            ->name('language.update');
        Route::get('delete/{id}', [LanguageController::class, 'delete'])->where(['id' => '[0-9]+'])
            ->name('language.delete');
        Route::delete('destroy/{id}', [LanguageController::class, 'destroy'])->where(['id' => '[0-9]+'])
            ->name('language.destroy');
        Route::get('swicth/{id}', [LanguageController::class, 'swicthBackendLanguuage'])->where(['id' => '[0-9]+'])
            ->name('language.swicth');
    });

    Route::group(['prefix' => 'post/catalogue'], function () {

        Route::get('index', [PostCatalogueController::class, 'index'])
            ->name('post.catalogue.index');
        Route::get('create', [PostCatalogueController::class, 'create'])
            ->name('post.catalogue.create');
        Route::post('store', [PostCatalogueController::class, 'store'])
            ->name('post.catalogue.store');
        Route::get('edit/{id}', [PostCatalogueController::class, 'edit'])->where(['id' => '[0-9]+'])
            ->name('post.catalogue.edit');
        Route::post('update/{id}', [PostCatalogueController::class, 'update'])->where(['id' => '[0-9]+'])
            ->name('post.catalogue.update');
        Route::get('delete/{id}', [PostCatalogueController::class, 'delete'])->where(['id' => '[0-9]+'])
            ->name('post.catalogue.delete');
        Route::delete('destroy/{id}', [PostCatalogueController::class, 'destroy'])->where(['id' => '[0-9]+'])
            ->name('post.catalogue.destroy');
    });

    Route::group(['prefix' => 'post'], function () {
        Route::get('index', [PostController::class, 'index'])
            ->name('post.index');
        Route::get('create', [PostController::class, 'create'])
            ->name('post.create');
        Route::post('store', [PostController::class, 'store'])
            ->name('post.store');
        Route::get('edit/{id}', [PostController::class, 'edit'])->where(['id' => '[0-9]+'])
            ->name('post.edit');
        Route::post('update/{id}', [PostController::class, 'update'])->where(['id' => '[0-9]+'])
            ->name('post.update');
        Route::get('delete/{id}', [PostController::class, 'delete'])->where(['id' => '[0-9]+'])
            ->name('post.delete');
        Route::delete('destroy/{id}', [PostController::class, 'destroy'])->where(['id' => '[0-9]+'])
            ->name('post.destroy');
    });

    Route::group(['prefix' => 'permission'], function () {
        Route::get('index', [PermissionController::class, 'index'])
            ->name('permission.index');
        Route::get('create', [PermissionController::class, 'create'])
            ->name('permission.create');
        Route::post('store', [PermissionController::class, 'store'])
            ->name('permission.store');
        Route::get('edit/{id}', [PermissionController::class, 'edit'])->where(['id' => '[0-9]+'])
            ->name('permission.edit');
        Route::post('update/{id}', [PermissionController::class, 'update'])->where(['id' => '[0-9]+'])
            ->name('permission.update');
        Route::get('delete/{id}', [PermissionController::class, 'delete'])->where(['id' => '[0-9]+'])
            ->name('permission.delete');
        Route::delete('destroy/{id}', [PermissionController::class, 'destroy'])->where(['id' => '[0-9]+'])
            ->name('permission.destroy');
    });

    Route::group(['prefix' => 'product/catalogue'], function () {

        Route::get('index', [ProductCatalogueController::class, 'index'])
            ->name('product.catalogue.index');
        Route::get('create', [ProductCatalogueController::class, 'create'])
            ->name('product.catalogue.create');
        Route::post('store', [ProductCatalogueController::class, 'store'])
            ->name('product.catalogue.store');
        Route::get('edit/{id}', [ProductCatalogueController::class, 'edit'])->where(['id' => '[0-9]+'])
            ->name('product.catalogue.edit');
        Route::post('update/{id}', [ProductCatalogueController::class, 'update'])->where(['id' => '[0-9]+'])
            ->name('product.catalogue.update');
        Route::get('delete/{id}', [ProductCatalogueController::class, 'delete'])->where(['id' => '[0-9]+'])
            ->name('product.catalogue.delete');
        Route::delete('destroy/{id}', [ProductCatalogueController::class, 'destroy'])->where(['id' => '[0-9]+'])
            ->name('product.catalogue.destroy');
    });

    Route::group(['prefix' => 'product'], function () {

        Route::get('index', [ProductController::class, 'index'])
            ->name('product.index');
        Route::get('create', [ProductController::class, 'create'])
            ->name('product.create');
        Route::post('store', [ProductController::class, 'store'])
            ->name('product.store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->where(['id' => '[0-9]+'])
            ->name('product.edit');
        Route::post('update/{id}', [ProductController::class, 'update'])->where(['id' => '[0-9]+'])
            ->name('product.update');
        Route::get('delete/{id}', [ProductController::class, 'delete'])->where(['id' => '[0-9]+'])
            ->name('product.delete');
        Route::delete('destroy/{id}', [ProductController::class, 'destroy'])->where(['id' => '[0-9]+'])
            ->name('product.destroy');
    });

    Route::group(['prefix' => 'brand'], function () {

        Route::get('index', [BrandController::class, 'index'])
            ->name('brand.index');
        Route::get('create', [BrandController::class, 'create'])
            ->name('brand.create');
        Route::post('store', [BrandController::class, 'store'])
            ->name('brand.store');
        Route::get('edit/{id}', [BrandController::class, 'edit'])->where(['id' => '[0-9]+'])
            ->name('brand.edit');
        Route::post('update/{id}', [BrandController::class, 'update'])->where(['id' => '[0-9]+'])
            ->name('brand.update');
        Route::get('delete/{id}', [BrandController::class, 'delete'])->where(['id' => '[0-9]+'])
            ->name('brand.delete');
        Route::delete('destroy/{id}', [BrandController::class, 'destroy'])->where(['id' => '[0-9]+'])
            ->name('brand.destroy');
    });

    //AJAX
    Route::get('ajax/location/getLocation', [LocationController::class, 'getLocation'])
        ->name('ajax.location.index');
    Route::post('ajax/dashboard/changeStatus', [AjaxDashBoardController::class, 'changeStatus'])
        ->name('ajax.dashboard.changeStatus');
    Route::post('ajax/dashboard/changeStatusAll', [AjaxDashBoardController::class, 'changeStatusAll'])
        ->name('ajax.dashboard.changeStatusAll');
});



Route::get('admin', [AuthController::class, 'Index'])->name('auth.admin')->middleware('login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('login', [AuthController::class, 'Login'])->name('auth.login');
