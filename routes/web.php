<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CourseController;

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
Route::get('admin/course/create',[App\Http\Controllers\Admin\CourseController::class, 'create'])->name('admin.course.create');
Route::post('admin/course/store',[App\Http\Controllers\Admin\CourseController::class, 'store'])->name('course.store');
Route::get('admin/course/{id}', [App\Http\Controllers\Admin\CourseController::class, 'show'])->name('admin.course.show');
Route::get('admin/course/{id}/edit', [App\Http\Controllers\Admin\CourseController::class, 'edit'])->name('admin.course.edit');
Route::put('admin/course/{id}', [App\Http\Controllers\Admin\CourseController::class, 'update'])->name('admin.course.update');
Route::delete('admin/course/{id}', [App\Http\Controllers\Admin\CourseController::class, 'destroy'])->name('admin.course.destroy');
// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'admin_index'])->name('admin_index');

// // コースに関するリソースコントローラのルート
Route::resource('admin/course', CourseController::class); // コースの CRUD 操作用ルート

// 上記のコードを実行すると、以下のルートが自動的に生成されます：
// admin/course (GET) - index（一覧表示）の表示
// admin/course/create (GET) - 新規作成フォームの表示
// admin/course/store (POST) - コースの新規作成
// admin/course/{id} (GET) - 特定のコースの表示
// admin/course/{id}/edit (GET) - 編集フォームの表示
// admin/course/{id} (PUT/PATCH) - コースの更新
// admin/course/{id} (DELETE) - コースの削除