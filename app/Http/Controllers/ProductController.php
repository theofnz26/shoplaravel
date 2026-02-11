<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    // On charge les produits ET leur catégorie en seulement 2 requêtes SQL [cite: 149]
    $lesProduits = \App\Models\Product::with('category')->get();

    return view('products.index', compact('lesProduits'));
}
    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    $categories = \App\Models\Category::all(); // Récupère toutes les catégories 
    return view('products.create', compact('categories'));
}

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        $isActive = $request->has('active');
        $imagePath = null; // Par défaut, pas d'image

        // 1. On vérifie si un fichier a été envoyé
        if ($request->hasFile('image')) {
            // 2. On récupère le fichier
            $file = $request->file('image');
            // 3. On crée un nom unique (ex: 17098822_dragon.jpg)
            $filename = time() . '_' . $file->getClientOriginalName();
            // 4. On déplace le fichier dans public/images/products
            $file->move(public_path('images/products'), $filename);
            // 5. On enregistre le CHEMIN dans la variable
            $imagePath = 'images/products/' . $filename;
        }

        \App\Models\Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'active' => $isActive,
            'image' => $imagePath, // On sauvegarde le chemin (ex: images/products/mon_image.jpg)
        ]);

        return redirect()->route('products.index')->with('success', 'Produit créé avec image !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // On remet notre code de détail
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }


   
   public function edit($id)
{
    $product = \App\Models\Product::findOrFail($id);
    // On récupère toutes les catégories pour les afficher dans le select [cite: 42]
    $categories = \App\Models\Category::all(); 

    return view('products.edit', compact('product', 'categories'));
}

    

public function update(Request $request, $id)
    {
        $product = \App\Models\Product::findOrFail($id);
        $isActive = $request->has('active');
        
        // On récupère les données du formulaire sauf l'image pour l'instant
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'active' => $isActive,
        ];

        // GESTION DE L'IMAGE (Si une nouvelle image est envoyée)
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/products'), $filename);
            
            // On ajoute le nouveau chemin aux données à mettre à jour
            $data['image'] = 'images/products/' . $filename;
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Produit mis à jour !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       // 1. On trouve le produit
        $product = \App\Models\Product::findOrFail($id);

        // 2. On le supprime de la base de données
        $product->delete();

        // 3. Redirection avec un message flash
        return redirect()->route('products.index')
                         ->with('success', 'Le produit a été définitivement supprimé.');
    }
}