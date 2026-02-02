<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        // La fonction route() fabrique l'URL toute seule !
        // Ici, on lui demande l'URL pour le produit n°42
        $lien = route('products.show', ['id' => 42]);
        
        return "Bienvenue ! Regarde notre produit vedette ici : " . $lien;
    }

    public function about()
    {
        return "À propos de notre boutique ShopLaravel.";
    }
}