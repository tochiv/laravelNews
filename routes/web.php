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

Route::resource('editor', \App\Http\Controllers\EditorController::class);

Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin');

Route::get('/editor/{id}/approve', [\App\Http\Controllers\EditorController::class, 'approve'])->name('editor.approve');

Route::get('/admin/{id}/approve', [\App\Http\Controllers\AdminController::class, 'approve'])->name('admin.approve');
