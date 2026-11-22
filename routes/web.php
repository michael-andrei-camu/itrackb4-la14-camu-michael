
<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

// Registration Routes
Route::get('/register', [RegisterController::class, 'create'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Custom routes must come BEFORE the resource route
Route::get('/books/spotlight', [BookController::class, 'spotlight'])
    ->name('books.spotlight');

Route::get('/books/genre/{category?}', [BookController::class, 'categoryFilter'])
    ->name('books.genre');

Route::resource('books', BookController::class)
    ->middlewareFor([
        'create',
        'store',
        'edit',
        'update',
        'destroy'
    ], 'auth')
    ->names([
        'index' => 'books.catalog',
        'show' => 'books.details',
    ]);

Route::resource('movies', MovieController::class)
    ->only(['index', 'create', 'store']);

    // Login and Logout Routes
Route::get('/login', [LoginController::class, 'create'])
    ->name('login');

Route::post('/login', [LoginController::class, 'store'])
    ->name('login.store');

Route::post('/logout', [LoginController::class, 'destroy'])
    ->name('logout');
