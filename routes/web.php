<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CartController;
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

// Auth Routes***********************************************************
Route::get('/admin', [AuthController::class, 'admin']);
Route::post('/admin_login', [AuthController::class, 'admin_login']);
Route::get('/admin/logout', [AuthController::class, 'admin_logout']);




// Front ********************************************************
Route::get('/', [FrontController::class, 'front']);
Route::get('/contact', function () {
    return view('front.pages.contact');
});

Route::get('/about', function () {
    return view('front.pages.about');
});

// Route::get('/{id}', [FrontController::class, 'category_product']);
Route::get('/product/{id}', [FrontController::class, 'single_product']);
Route::get('/category/{id}', [FrontController::class, 'showByCategory'])->name('category.products');


// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');



// Admin Dashboard********************************************************
route::group(['middleware' => 'admin'], function(){
   
Route::get('/admin/dashboard', function () {
        return view('admin.pannel.dashboard');
    });


Route::get('/admin/category_list', [AdminController::class, 'category_list']);
Route::get('/admin/add_category', [AdminController::class, 'add_category']);
Route::post('/admin/add_category', [AdminController::class, 'save_category']);
Route::get('/admin/edit_category/{id}', [AdminController::class, 'edit_category']);
Route::post('/admin/edit_category/{id}', [AdminController::class, 'update_category']);
Route::get('/admin/delete_category/{id}', [AdminController::class, 'delete_category']);

Route::get('/admin/subcategory_list', [AdminController::class, 'subcategory_list']);
Route::get('/admin/add_subcategory', [AdminController::class, 'add_subcategory']);
Route::post('/admin/add_subcategory', [AdminController::class, 'save_subcategory']);
Route::get('/admin/edit_subcategory/{id}', [AdminController::class, 'edit_subcategory']);
Route::post('/admin/edit_subcategory/{id}', [AdminController::class, 'update_subcategory']);
Route::get('/admin/delete_subcategory/{id}', [AdminController::class, 'delete_subcategory']);

Route::get('/admin/product_list', [AdminController::class, 'product_list']);
Route::get('/admin/add_product', [AdminController::class, 'add_product']);
Route::post('/admin/add_product', [AdminController::class, 'save_product']);
Route::get('/admin/edit_product/{id}', [AdminController::class, 'edit_product']);
Route::post('/admin/edit_product/{id}', [AdminController::class, 'update_product']);
Route::get('/admin/delete_product/{id}', [AdminController::class, 'delete_product']);

Route::get('/admin/banner_list', [AdminController::class, 'banner_list']);
Route::get('/admin/add_banner', [AdminController::class, 'add_banner']);
Route::post('/admin/add_banner', [AdminController::class, 'save_banner']);
Route::get('/admin/edit_banner/{id}', [AdminController::class, 'edit_banner']);
Route::post('/admin/edit_banner/{id}', [AdminController::class, 'update_banner']);
Route::get('/admin/delete_banner/{id}', [AdminController::class, 'delete_banner']);

});