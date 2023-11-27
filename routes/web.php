<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
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

Route::get('/', [ProductController::class, 'getAvailableProducts']);
//Route::resource('dashboard/products', ProductController::class);

Route::get('dashboard/products', [ProductController::class, 'index'])->name('products.index');
Route::get('dashboard/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('dashboard/products', [ProductController::class, 'store'])->name('products.store');
Route::get('dashboard/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('dashboard/products/{product:slug}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('dashboard/products/{product:slug}', [ProductController::class, 'update'])->name('products.update');
Route::delete('dashboard/products/{product:slug}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::resource('dashboard/categories', CategoryController::class);
Route::resource('dashboard/roles', RoleController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'client_rol'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
