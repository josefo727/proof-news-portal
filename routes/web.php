<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::get('/', [NewsController::class, 'index'])->name('news.index');
Route::get('/categoria/{slug}', [NewsController::class, 'newsByCategory'])->name('news.category');
Route::get('/articulo/{slug}', [NewsController::class, 'newsArticle'])->name('news.article');

Route::get('about', function () {
    return view('site.about');
});

Route::get('contact', function () {
    return view('site.contact');
});

Route::prefix('admin')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');
});

Route::prefix('/admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('home', [HomeController::class, 'index'])->name('home');
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('users', UserController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('posts', PostController::class);
    });
