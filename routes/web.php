<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function (){
    Route::get('login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login');
    Route::post('login', [\App\Http\Controllers\Admin\AuthController::class, 'loginCheck'])->name('loginCheck');
    Route::get('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
    Route::group(['middleware' => 'admin.auth'], function (){
        Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::group([
            'prefix' => 'category',
            'as'=> 'category.'
        ], function (){
            Route::get('/', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('list');
            Route::get('create', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('create');
            Route::post('create', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('store');
            Route::get('edit/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('update');
            Route::get('delete/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('delete');
        });
        Route::group([
            'prefix' => 'article',
            'as' => 'article.'
        ], function (){
            Route::get('/', [\App\Http\Controllers\Admin\ArticleController::class, 'index'])->name('list');
            Route::get('create', [\App\Http\Controllers\Admin\ArticleController::class, 'create'])->name('create');
            Route::post('store', [\App\Http\Controllers\Admin\ArticleController::class, 'store'])->name('store');
            Route::get('edit/{id}', [\App\Http\Controllers\Admin\ArticleController::class, 'edit'])->name('edit');
        });
    });
});
