<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('home');
Route::post('/', [MainController::class, 'store'])->name('store');
Route::get('/{url}', [MainController::class, 'edit'])->name('edit');
