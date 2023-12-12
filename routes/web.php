<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\UserCatalogueController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ajax\LocationController;
use App\Http\Controllers\Ajax\DashboardController as AjaxDashBoardController;

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
Route::get('/', function () {
    return view('home-layout');
});

//BACKEND
Route::get('dashboard/index', [DashboardController::class, 'index'])
    ->name('dashboard.index')->middleware('admin');

//USER
Route::group(['prefix' => 'user'], function () {

    Route::get('index', [UsersController::class, 'index'])
        ->name('user.index')->middleware('admin');
    Route::get('create', [UsersController::class, 'create'])
        ->name('user.create')->middleware('admin');
    Route::post('store', [UsersController::class, 'store'])
        ->name('user.store')->middleware('admin');
    Route::get('edit/{id}', [UsersController::class, 'edit'])->where(['id' => '[0-9]+'])
        ->name('user.edit')->middleware('admin');
    Route::post('update/{id}', [UsersController::class, 'update'])->where(['id' => '[0-9]+'])
        ->name('user.update')->middleware('admin');
    Route::get('delete/{id}', [UsersController::class, 'delete'])->where(['id' => '[0-9]+'])
        ->name('user.delete')->middleware('admin');
    Route::delete('destroy/{id}', [UsersController::class, 'destroy'])->where(['id' => '[0-9]+'])
        ->name('user.destroy')->middleware('admin');
});

Route::group(['prefix' => 'user/catalogue'], function () {

    Route::get('index', [UserCatalogueController::class, 'index'])
        ->name('user.catalogue.index')->middleware('admin');
    Route::get('create', [UserCatalogueController::class, 'create'])
        ->name('user.catalogue.create')->middleware('admin');
    Route::post('store', [UserCatalogueController::class, 'store'])
        ->name('user.catalogue.store')->middleware('admin');
    Route::get('edit/{id}', [UserCatalogueController::class, 'edit'])->where(['id' => '[0-9]+'])
        ->name('user.catalogue.edit')->middleware('admin');
    Route::post('update/{id}', [UserCatalogueController::class, 'update'])->where(['id' => '[0-9]+'])
        ->name('user.catalogue.update')->middleware('admin');
    Route::get('delete/{id}', [UserCatalogueController::class, 'delete'])->where(['id' => '[0-9]+'])
        ->name('user.catalogue.delete')->middleware('admin');
    Route::delete('destroy/{id}', [UserCatalogueController::class, 'destroy'])->where(['id' => '[0-9]+'])
        ->name('user.catalogue.destroy')->middleware('admin');
});

//AJAX
Route::get('ajax/location/getLocation', [LocationController::class, 'getLocation'])
    ->name('ajax.location.index')->middleware('admin');
Route::post('ajax/dashboard/changeStatus', [AjaxDashBoardController::class, 'changeStatus'])
    ->name('ajax.dashboard.changeStatus')->middleware('admin');
Route::post('ajax/dashboard/changeStatusAll', [AjaxDashBoardController::class, 'changeStatusAll'])
    ->name('ajax.dashboard.changeStatusAll')->middleware('admin');

Route::get('admin', [AuthController::class, 'Index'])->name('auth.admin')->middleware('login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('login', [AuthController::class, 'Login'])->name('auth.login');
