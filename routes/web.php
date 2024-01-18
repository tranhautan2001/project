<?php

use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\client\CLPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\client\CLCartController;
use App\Http\Controllers\client\CLOrderController;
use App\Http\Controllers\Admin\AdminLoginProduct;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;

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

Route::get('/', [CLPageController::class, 'index']);
Route::get('/client/carts', [CLCartController::class, 'index'])->name('client.carts.index');
Route::post('add-to-cart', [CLCartController::class, 'store'])->name('client.carts.add');
Route::resource('carts', CLCartController::class);
Route::post('/cart/clear', [CLCartController::class, 'clearCart'])->name('cart.clear');
Route::post('/update-cart',  [CLCartController::class, 'updateCart'])->name('update.carts');
Route::get('/checkout/{id}', [CLOrderController::class, 'checkout'])->name('checkout');
Route::resource('oders', CLOrderController::class);
Route::get('/category/{slug}', [CLPageController::class, 'show'])->name('category.show');
Route::get('/categories/{slug}', [CLPageController::class, 'show'])->name('categories.show');
// Route::get('/detail', [CLOrderController::class, 'index'])->name('details.index');
Route::get('/detail/{slug}', [CLOrderController::class, 'show'])->name('details.show');



Route::get('/login', function () {
    return view('client.logins.login');
});


Route::get('/admin-login', [AdminLoginProduct::class, 'login'])->name('loginAdmin');
Route::post('/admin-login', [AdminLoginProduct::class, 'postLogin']);
Route::get('/logoutAdmin', [AdminLoginProduct::class, 'logout'])->name('logoutAdmin');


Route::post('/get-district', [CLOrderController::class, 'getDistrict']);
Route::post('/get-wards', [CLOrderController::class, 'getWards']);

Route::get('/erros', function () {
    return view('client.erros');
});
Route::get('/category', function () {
    return view('client.category');
});
Route::get('/detail', function () {
    return view('client.details');
});
Route::get('/cart', function () {
    return view('client.cart');
});
Route::get('/checkout', function () {
    return view('client.checkout');
});
// Route::get('/admin', function () {
//     return view('admin.index');
// });
Route::get('/product', function () {
    return view('admin.products.index');
});




Route::middleware(['CheckUserRole:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin');
    Route::resource('products', ProductController::class)->middleware('CheckPermission');
    Route::resource('suppliers', SupplierController::class)->middleware('CheckPermission');
    Route::resource('pages', PageController::class)->middleware('CheckPermission');
    Route::resource('categorys', ProductCategoryController::class)->middleware('CheckPermission');
    Route::resource('posts', PostController::class)->middleware('CheckPermission');
    Route::resource('users', UserController::class)->middleware('CheckPermission');
    Route::resource('orders', OrderController::class);

});