<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerFeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('home');
// })->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

route::get('/product/detail/{product}', function (Product $product) {
    return view('product.productdetail', compact('product'));
})->name('product.detail');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => 'master', 'as' => 'master.'], function () {
        Route::resource('category', CategoryController::class);
        Route::resource('product', ProductController::class);
        Route::resource('user', UserController::class);
    });
    Route::resource('order', OrderController::class);
    Route::get('order/print/{order}', [OrderController::class, 'print'])->name('order.print');
    Route::resource('cart', CartController::class);
});
Route::resource('costumer-feedback', CustomerFeedbackController::class);

// Route::controller(App\Http\Controllers\CategoryController::class)->group(function () {
//     Route::get('/category', 'index');
//     Route::get('/add-category', 'create');
//     Route::post('/save-category', 'store');
// });

require __DIR__ . '/auth.php';
