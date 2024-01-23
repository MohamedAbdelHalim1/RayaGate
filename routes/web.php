<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

//Product Routes

Route::get('/', [ProductController::class , 'index'])->name('view_all_products');
Route::get('/add_product' , [ProductController::class , 'add_product'])->name('add_product');
Route::post('/add_product' , [ProductController::class , 'store'])->name('store');
Route::get('/more_details/{id}' , [ProductController::class , 'more_details'])->name('more_details');
Route::get('/edit_product/{id}' , [ProductController::class , 'edit_product'])->name('edit_product');
Route::post('/edit_product/{id}' , [ProductController::class , 'upload_product'])->name('upload_product');
Route::post('/delete_product/{id}', [ProductController::class , 'delete_product']);

//Category Route 

Route::get('/category' , [CategoryController::class , 'index'])->name('view_all_categories');
Route::get('/add_category' , [CategoryController::class , 'add_category'])->name('add_category');
Route::post('/add_category' , [CategoryController::class , 'store'])->name('store_category');
Route::get('/more_details_category/{id}' , [CategoryController::class , 'more_details'])->name('category_more_details');
Route::get('/edit_category/{id}' , [CategoryController::class , 'edit_category'])->name('edit_category');
Route::post('/edit_category/{id}' , [CategoryController::class , 'upload_category'])->name('upload_category');
Route::post('/delete_category/{id}', [CategoryController::class , 'delete_category']);