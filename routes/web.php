<?php

use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => env('FOR_ADMIN_URL'), 'as' => 'admin.', 'middleware' => 'admin'], function () {
   Route::get('/', [AdminMainController::class, 'index'])->name('index');
   Route::post('/', [AdminMainController::class, 'search'])->name('search');
   Route::delete('/', [AdminMainController::class, 'delete'])->name('delete');
});
Route::post('/admin/auth', [AdminMainController::class, 'auth'])->name('admin.auth');

Route::get('/', [MainController::class, 'index'])->name('home');
Route::post('/', [MainController::class, 'store'])->name('store');
Route::get('/{url}', [MainController::class, 'edit'])->name('edit');
Route::put('/{url}', [MainController::class, 'update'])->name('update');
