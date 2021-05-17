<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which CreateWorkCat
| contains the "web" middleware group. Now create something great!
|
*/
//
Route::get('/welc', function () {
    return view('welcome');
})->name('welcome');

Route::get('/user', function () {
    return view('user');
})->name('user');
Route::get('/user/{id}', [App\Http\Controllers\AdminInfo::class, 'cp'])->name('cp');

Route::get('/zakaz', [App\Http\Controllers\AdminInfo::class, 'CreateWorkCat'])->name('zakaz');
Route::get('/zakaz/info', [App\Http\Controllers\AdminInfo::class, 'zakazInfo'])->name('zakaz-info');
Route::get('/zakaz/delete/{id}', [App\Http\Controllers\AdminInfo::class, 'workDelete'])->name('workDelete');
Route::get('/zakaz/{id}', [App\Http\Controllers\AdminInfo::class, 'workInfo'])->name('workInfo');

Route::get('/worksAdmin', [App\Http\Controllers\AdminInfo::class, 'worksAdmin'])->name('worksAdmin');

Route::post('/worksAdmin/{id}', [App\Http\Controllers\AdminInfo::class, 'worksAdminChenge'])->name('worksAdminChenge');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\AdminInfo::class, 'welcomeInfo'])->name('welcomeInfo');

Route::get('/info/{id}', [App\Http\Controllers\AdminInfo::class, 'info'])->name('info');

Route::get('/admin', [App\Http\Controllers\AdminInfo::class, 'adminInfo'])->name('admin');

Route::post('/admin', [App\Http\Controllers\AdminInfo::class, 'adminCreateCategory'])->name('adminCreateCategoty');
Route::post('/test', [App\Http\Controllers\AdminInfo::class, 'fileUpload'])->name('test');

Route::get('/admin/delete/{id}', [App\Http\Controllers\AdminInfo::class, 'adminDeleteCategory'])->name('adminCreateCategoty-delete');
Route::get('/admin/delete', [App\Http\Controllers\AdminInfo::class, 'adminDeleteInfo'])->name('admin-delete-info');

