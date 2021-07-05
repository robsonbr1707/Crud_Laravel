<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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

Route::middleware(['auth'])->group(function(){
    Route::get('/events/create', [EventController::class, 'create']);
    Route::delete('/events/{id}', [EventController::class, 'destroy']);
    Route::get('/events/edit/{id}', [EventController::class, 'edit']);
    Route::put('/events/update/{id}', [EventController::class, 'update']);
    Route::get('/dashboard', [EventController::class, 'dashboard']);
    Route::post('/events/join/{id}', [EventController::class, 'joinEvent']);
    Route::delete('/events/leave/{id}', [EventController::class, 'leaveEvent']);
});

Route::get('/', [EventController::class, 'index']);
Route::get('/events/{id}', [EventController::class, 'show']);
Route::post('/events', [EventController::class, 'store']);

Route::get('/contact', function () {
    return view('contact');
});

