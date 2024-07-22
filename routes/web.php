<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\BlogsController;

// Route::get(
//     '/',
//     [SiteController::class, 'index']
// );

// Route::get(
//     '/page2',
//     [SiteController::class, 'page2']
// );


// Route::get(
//     '/blogs',
//     [BlogsController::class, 'index']
// );

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'login_check'])->name('login_check');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//إنشاء سبع مسارات
// Route::resource('posts', BlogsController::class);

Route::group(
    [
        'prefix' => '/dashboard',
        'middleware' => ['IsAdmin'],
        'as' => 'dashboard.',
    ],
    function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::post('/upload', [UploadController::class, 'upload_image'])->name('upload');
        Route::resource('posts', BlogsController::class);
        Route::resource('authors', AuthorsController::class);
    }
);

// Route::get(
//     '/',
//     function () {
//         return view('welcome');
//     }
// );
