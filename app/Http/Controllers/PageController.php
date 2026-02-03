<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
   public function home()
{
    // 1. On prépare les données (comme demandé dans l'exercice)
    $data = [
        'nomBoutique' => 'ShopLaravel',
        'description' => 'La référence pour apprendre Laravel 12',
        'ouvert' => true,
    ];

    // 2. On envoie le tableau $data à la vue
    // Le deuxième paramètre de view() sert à passer les variables
    return view('home', ['donnees' => $data]);
}

            public function about()
    {
        return view('about');
    }
}