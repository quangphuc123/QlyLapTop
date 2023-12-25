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
use App\Http\Controllers\Backend\PrductCatalogueController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\PermissionController;


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
Route::get('thong-tin-tai-khoan',[UsersController::class,'accountDetail'])->name('accountDetail');
Route::post('cap-nhat',[UsersController::class,'updateAccount'])->name('xl-cap-nhat');

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
