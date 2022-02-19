<?php

use App\Http\Controllers\Home\AdminController;
use App\Http\Controllers\Home\LoginController;
use Illuminate\Support\Facades\Route;

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
# Rotas Acesso
Route::name('login.')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('home');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

# Rotas Login
Route::name('admin.')->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('home');
    Route::get('/search', [AdminController::class, 'search'])->name('search');
    Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('delete');
});
