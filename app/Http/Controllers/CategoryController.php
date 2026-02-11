<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Affiche les produits d'une catégorie spécifique.
     */
    public function show(Category $category)
    {
        // On charge les produits de la catégorie de manière optimisée (Lazy Eager Loading)
        // [cite: 31, 36]
        $category->load('products');

        return view('categories.show', [
            'category' => $category,
            'lesProduits' => $category->products // On passe la liste des produits à la vue [cite: 34]
        ]);
    }
}