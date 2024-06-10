<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [ProductController::class, 'index'])->name('product.index');
Route::get('/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/store', [ProductController::class,'store'])->name('product.store');
Route::get('/product/{id}/edit', [ProductController::class,'edit'])->name('product.edit');
Route::put('/product/{id}', [ProductController::class,'update'])->name('product.update');
Route::get('/product/{id}/delete', [ProductController::class, 'showDeleteConfirmation'])->name('product.delete.confirm');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

