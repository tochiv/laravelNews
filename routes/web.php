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

Route::redirect('/', '/login');

Auth::routes();

Route::get('/home', [\App\Http\Controllers\User\HomeController::class, 'index'])->name('home');

Route::resource('editor', \App\Http\Controllers\Editor\EditorController::class);

Route::get('/admin', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');

Route::get('/editor/{id}/approve', [\App\Http\Controllers\Editor\EditorController::class, 'approve'])->name('editor.approve');

Route::get('/admin/{id}/approve', [\App\Http\Controllers\Admin\AdminController::class, 'approve'])->name('admin.approve');

Route::get('/admin/{id}/disapprove', [\App\Http\Controllers\Admin\AdminController::class, 'disapprove'])->name('admin.disapprove');

Route::delete('/admin/{id}/destroy', [\App\Http\Controllers\Admin\AdminController::class, 'destroy'])->name('admin.destroy');

Route::get('/post/{id}/comment', [\App\Http\Controllers\Comment\CommentController::class, 'index'])->name('comment');
