<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController; 

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

/* -----------------------------------------------------------------------
   EXERCICE PARTIE 5 : UTILISATION DU CONTROLLER RESOURCE
   -----------------------------------------------------------------------
   L'ancienne méthode  :
*/
// Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
// Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
// Route::get('/products/create', [ProductController::class, 'create'])->name('products.create'); // (Si tu l'avais ajoutée)
// Route::post('/products', [ProductController::class, 'store'])->name('products.store'); // (Si tu l'avais ajoutée)

/* La nouvelle méthode automatique :
   Cette seule ligne crée les 7 routes (index, create, store, show, edit, update, destroy).
*/
Route::resource('products', ProductController::class);


// La route pour les catégories reste manuelle (car ce n'est pas un CRUD complet pour l'instant)
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');