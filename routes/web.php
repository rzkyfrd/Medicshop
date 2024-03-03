<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('category', [App\Http\Controllers\CategoryController::class, 'index']);
// Route::get('category/add-category', [App\Http\Controllers\CategoryController::class, 'create']);
// Route::post('category/save-category', [App\Http\Controllers\CategoryController::class, 'store']);
Route::resource('category', CategoryController::class);
// Route::controller(App\Http\Controllers\CategoryController::class)->group(function () {
//     Route::get('/category', 'index');
//     Route::get('/add-category', 'create');
//     Route::post('/save-category', 'store');
// });


require __DIR__ . '/auth.php';
