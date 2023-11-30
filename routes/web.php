<?php

use App\Http\Controllers\Admin\BannerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\NoticeController;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'admin_index'])->name('admin_index');
Route::get('/admin/courses', [App\Http\Controllers\Admin\CourseController::class, 'index'])->name('admin.course.index');
Route::get('admin/course/create', [App\Http\Controllers\Admin\CourseController::class, 'create'])->name('admin.course.create');
Route::post('admin/course/store', [App\Http\Controllers\Admin\CourseController::class, 'store'])->name('course.store');
Route::get('admin/course/{id}', [App\Http\Controllers\Admin\CourseController::class, 'show'])->name('admin.course.show');
Route::get('admin/course/{id}/edit', [App\Http\Controllers\Admin\CourseController::class, 'edit'])->name('admin.course.edit');
Route::put('admin/course/{id}', [App\Http\Controllers\Admin\CourseController::class, 'update'])->name('admin.course.update');
Route::delete('admin/course/{id}', [App\Http\Controllers\Admin\CourseController::class, 'destroy'])->name('admin.course.destroy');

Route::resource('admin/notice', NoticeController::class);
Route::get('/admin/notice', [NoticeController::class, 'index'])->name('admin.notice.index');


Route::get('/admin/banner', [BannerController::class, 'index'])->name('admin.banner.index');
Route::get('/admin/banner/create', [BannerController::class, 'create'])->name('admin.banner.create');
Route::post('/admin/banner/store', [BannerController::class, 'store'])->name('admin.banner.store');
Route::delete('admin/banner/{banner}', [BannerController::class, 'destroy'])->name('admin.banner.destroy');
