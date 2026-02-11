<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductControllerold extends Controller
{
    // Ici, la variable $id va recevoir automatiquement ce qu'il y a dans l'URL
   public function show($id)
    {
        // On cherche le produit dans la BDD avec son ID
        // findOrFail : Si l'ID n'existe pas, Laravel renvoie automatiquement une erreur 404.
        $product = \App\Models\Product::findOrFail($id);

        // On l'envoie à la vue
        return view('products.show', compact('product'));
    }
public function index()
    {
        // On récupère TOUS les produits de la base de données
        $lesProduits = \App\Models\Product::all();

        // On envoie ces données à la vue
        return view('products.index', compact('lesProduits'));
    }
}  