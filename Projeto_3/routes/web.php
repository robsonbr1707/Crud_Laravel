<?php

use App\Http\Controllers\{
    PostController
};
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::put('posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
});

Route::any('posts/search', [PostController::class, 'search'])->name('posts.search');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/', [PostController::class, 'index'])->name('posts.index'); 

Route::get('/dashboard', function () {
    return redirect()->route('posts.index');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';