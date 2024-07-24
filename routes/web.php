<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('auth.login');
})->name('login');


Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register/create', [RegisterController::class, 'store'])->name('register.store');

Route::post('login', [LoginController::class, 'store'])->name('login.store');

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');


//TODO: Routes Product

Route::get('/products', [ProductController::class, 'index'])->name('products');