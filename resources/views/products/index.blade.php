@extends('layouts.app')

@section('title', 'Boutique Officielle')

@section('content')
<style>
    /* --- AMBIANCE GLOBALE --- */
    .store-container {
        background-color: #0d1117; /* Fond très sombre style Konami */
        color: #e6e6e6;
        font-family: 'Roboto', sans-serif;
        min-height: 100vh;
        padding: 40px 20px;
    }

    .section-title {
        text-transform: uppercase;
        font-size: 2rem;
        margin-bottom: 30px;
        border-left: 5px solid #c5a059; /* Liseré Doré */
        padding-left: 15px;
        color: white;
    }

    /* --- GRILLE PRODUITS --- */
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); /* Responsive */
        gap: 25px;
    }

    /* --- CARTE PRODUIT (ITEM) --- */
    .product-card {
        background: #161b22;
        border: 1px solid #30363d;
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        display: flex;
        flex-direction: column;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
        border-color: #c5a059; /* Bordure dorée au survol */
    }

    /* --- IMAGE PRODUIT --- */
    .product-image-wrapper {
        height: 250px;
        background: white; /* Fond blanc pour bien voir les boîtes */
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .product-image-wrapper img {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
    }

    /* Badge promo ou stock (Optionnel) */
    .badge-stock {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #238636; /* Vert "En stock" */
        color: white;
        font-size: 0.75rem;
        padding: 4px 8px;
        border-radius: 4px;
        font-weight: bold;
    }

    /* --- INFOS PRODUIT --- */
    .product-info {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .product-category {
        color: #8b949e;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 5px;
    }

    .product-title {
        font-size: 1.1rem;
        font-weight: bold;
        color: white;
        margin: 0 0 10px 0;
        line-height: 1.4;
    }

    .product-description {
        font-size: 0.9rem;
        color: #8b949e;
        margin-bottom: 20px;
        flex-grow: 1; /* Pousse le prix vers le bas */
    }

    /* --- PRIX ET ACTION --- */
    .product-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: auto; /* Colle au fond */
        border-top: 1px solid #30363d;
        padding-top: 15px;
    }

    .price {
        font-size: 1.4rem;
        font-weight: bold;
        color: #c5a059; /* Or */
    }

    .btn-details {
        background-color: transparent;
        border: 1px solid #c5a059;
        color: #c5a059;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s;
    }

    .btn-details:hover {
        background-color: #c5a059;
        color: #0d1117;
    }
</style>

<div class="store-container">
    <div style="max-width: 1200px; margin: 0 auto;">
        
        <h1 class="section-title">Nouveautés Yu-Gi-Oh!</h1>

        <div class="products-grid">
            @forelse($lesProduits as $produit)
                <article class="product-card">
                    
                    {{-- Zone Image (Boîte de display, Deck, etc.) --}}
                    <div class="product-image-wrapper">
                        @if($produit->active)
                            <span class="badge-stock">EN STOCK</span>
                        @else
                            <span class="badge-stock" style="background: #da3633;">RUPTURE</span>
                        @endif

                        @if($produit->image)
                            <img src="{{ $produit->image }}" alt="{{ $produit->name }}">
                        @else
                            {{-- Placeholder propre si pas d'image --}}
                            <img src="https://via.placeholder.com/300x300?text=Produit+YGO" alt="Pas d'image">
                        @endif
                    </div>

                    {{-- Zone Infos --}}
                    <div class="product-info">
                        {{-- MODIFICATION ICI : On affiche la vraie catégorie dynamiquement --}}
                        <div class="product-category">
                            {{ $produit->category->name ?? 'Aucune catégorie' }}
                        </div>
                        
                        <h2 class="product-title">{{ $produit->name }}</h2>
                        
                        <p class="product-description">
                            {{ Str::limit($produit->description, 60) }}
                        </p>

                        <div class="product-footer">
                            <div class="price">{{ $produit->price }} €</div>
                            <a href="{{ route('products.show', $produit->id) }}" class="btn-details">
                                VOIR
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <p>Aucun produit disponible pour le moment.</p>
            @endforelse
        </div>

    </div>
</div>
@endsection