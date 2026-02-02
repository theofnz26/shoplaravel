<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/hello', function () {
    return 'Hello Laravel!';
});

// On donne le nom 'home' à l'accueil
Route::get('/', [PageController::class, 'home'])->name('home');

// On donne le nom 'about' à la page à propos
Route::get('/about', [PageController::class, 'about'])->name('about');

// On donne le nom 'products.show' à la page produit
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');