<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Ici, la variable $id va recevoir automatiquement ce qu'il y a dans l'URL
    public function show($id)
    {
        return "Détails du produit n°" . $id;
    }

// Exercice 3 : Afficher une liste de produits
    public function index()
    {
        // 1. On crée une liste fictive de produits (Tableau de tableaux)
        $products = [
            ['id' => 1, 'name' => 'Vélo de course', 'price' => 499],
            ['id' => 2, 'name' => 'Casque audio', 'price' => 89],
            ['id' => 3, 'name' => 'Montre connectée', 'price' => 199],
            ['id' => 4, 'name' => 'Sac à dos', 'price' => 45],
        ];

        // 2. On envoie cette liste à la vue 'products.index'
        // Le point dans 'products.index' signifie : dossier "products", fichier "index"
        return view('products.index', ['lesProduits' => $products]);
    }
}  