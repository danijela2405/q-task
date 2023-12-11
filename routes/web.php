<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
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
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/authors', [AuthorsController::class, 'index'])->name('authors.list');
    Route::get('/authors/{id}', [AuthorsController::class, 'view'])->name('authors.view');
    Route::delete('/authors/{id}', [AuthorsController::class, 'destroy'])->name('authors.destroy');
    Route::get('/books', [BooksController::class, 'create'])->name('books.create');
    Route::post('/books', [BooksController::class, 'store'])->name('books.store');
    Route::delete('/books/{id}', [BooksController::class, 'destroy'])->name('books.destroy');
});

require __DIR__.'/auth.php';
