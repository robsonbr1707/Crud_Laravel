<?php

use App\Http\Controllers\UsersController;
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

Route::get('/create', [UsersController::class, 'create'])->name('index.create');
Route::get('/', [UsersController::class, 'index'])->name('index.home');
Route::post('/', [UsersController::class, 'store'])->name('index.store');
Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('index.edit');
Route::put('/update/{id}', [UsersController::class, 'update'])->name('index.update');
Route::delete('/{id}', [UsersController::class, 'destroy'])->name('index.destroy');
