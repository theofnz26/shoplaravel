@extends('layouts.app')

@section('title', isset($category) ? $category->name : 'Boutique Officielle')

@section('content')

<style>
    .product-image-wrapper {
        height: 250px;
        background: #fff; 
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        border-bottom: 1px solid #2c3545;
    }
    
    .product-image-wrapper img {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
        transition: transform 0.3s ease;
    }

    .badge-stock {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #238636;
        color: white;
        font-size: 0.75rem;
        padding: 4px 8px;
        border-radius: 4px;
        font-weight: bold;
        z-index: 2;
        box-shadow: 0 2px 5px rgba(0,0,0,0.5);
    }

    /* Style pour le lien de catégorie */
    .cat-link {
        color: #00d2ff;
        text-decoration: none;
        transition: color 0.2s;
    }
    .cat-link:hover {
        color: #e8b046;
        text-decoration: underline;
    }
</style>

<div class="store-container">
    <div> 
        <h1 class="section-title">
            {{ isset($category) ? $category->name : 'Liste des Cartes' }}
        </h1>

        <div class="products-grid">
            @forelse($lesProduits as $produit)
                <article class="product-card">
                    
                    <div class="product-image-wrapper">
                        @if($produit->active)
                            <span class="badge-stock">EN STOCK</span>
                        @else
                            <span class="badge-stock" style="background: #da3633;">RUPTURE</span>
                        @endif

                        @if($produit->image)
                            @if(Str::startsWith($produit->image, 'http'))
                                <img src="{{ $produit->image }}" alt="{{ $produit->name }}">
                            @else
                                <img src="{{ asset($produit->image) }}" alt="{{ $produit->name }}">
                            @endif
                        @else
                            <img src="https://via.placeholder.com/300x400?text=No+Card" alt="Pas d'image">
                        @endif
                    </div>

                    <div class="product-info" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                        {{-- OBJECTIF 2 : Affichage du nom de la catégorie [cite: 20, 136] --}}
                        <div class="product-category" style="color: #8b9bb4; font-size: 0.8rem; text-transform: uppercase; margin-bottom: 5px;">
                            @if($produit->category)
                                {{-- On prépare déjà le lien pour l'Objectif 3 --}}
                                <a href="{{ route('categories.show', $produit->category->id) }}" class="cat-link">
                                    {{ $produit->category->name }}
                                </a>
                            @else
                                <span style="opacity: 0.5;">Non classé</span>
                            @endif
                        </div>
                        
                        <h2 style="font-size: 1.2rem; margin: 0 0 10px 0; color: white;">{{ $produit->name }}</h2>
                        
                        <p style="color: #8b9bb4; font-size: 0.9rem; flex-grow: 1; margin-bottom: 20px;">
                            {{ Str::limit($produit->description, 60) }}
                        </p>

                        <div class="product-footer" style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #2c3545; padding-top: 15px;">
                            <div class="price" style="color: #e8b046; font-size: 1.4rem; font-weight: bold;">
                                {{ $produit->price }} €
                            </div>
                            
                            <div style="display: flex; gap: 5px;">
                                <a href="{{ route('products.show', $produit->id) }}" class="btn-details" style="border: 1px solid #00d2ff; color: #00d2ff; padding: 5px 10px; border-radius: 4px; text-decoration: none; font-size: 0.8rem;">
                                    VOIR
                                </a>
                                
                                <a href="{{ route('products.edit', $produit->id) }}" class="btn-details" style="border: 1px solid #e8b046; color: #e8b046; padding: 5px 10px; border-radius: 4px; text-decoration: none; font-size: 0.8rem;">
                                    EDIT
                                </a>

                                <form action="{{ route('products.destroy', $produit->id) }}" method="POST" onsubmit="return confirm('Supprimer cette carte ?');" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: transparent; border: 1px solid #da3633; color: #da3633; padding: 5px 10px; border-radius: 4px; cursor: pointer; font-size: 0.8rem;">
                                        X
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </article>
            @empty
                <p>Aucune carte dans le Deck.</p>
            @endforelse
        </div>

    </div>
</div>
@endsection