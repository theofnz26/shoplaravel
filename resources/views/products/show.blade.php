@extends('layouts.app')

@section('title', $product->name)

@section('content')
<style>
    .product-container {
        max-width: 1000px;
        margin: 40px auto;
        background: #161b22;
        border: 1px solid #30363d;
        border-radius: 8px;
        padding: 30px;
        color: #e6e6e6;
        display: flex;
        gap: 40px; /* Espace entre l'image et le texte */
        align-items: flex-start;
    }

    /* Colonne Image */
    .product-left {
        flex: 1;
        background: white;
        padding: 20px;
        border-radius: 8px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .product-left img {
        max-width: 100%;
        max-height: 400px;
        object-fit: contain;
    }

    /* Colonne Infos */
    .product-right {
        flex: 1.5;
        display: flex;
        flex-direction: column;
    }

    .product-category-badge {
        background: #238636;
        color: white;
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: bold;
        align-self: flex-start;
        margin-bottom: 15px;
    }

    h1 {
        font-size: 2.5rem;
        margin: 0 0 15px 0;
        color: white;
    }

    .price-large {
        font-size: 2rem;
        color: #c5a059; /* Or */
        font-weight: bold;
        margin-bottom: 20px;
        border-bottom: 1px solid #30363d;
        padding-bottom: 20px;
        display: block;
    }

    .description-text {
        font-size: 1rem;
        line-height: 1.6;
        color: #8b949e;
        margin-bottom: 30px;
    }

    .action-buttons {
        display: flex;
        gap: 15px;
    }

    .btn-cart {
        background-color: #c5a059;
        color: #0d1117;
        padding: 15px 30px;
        border: none;
        border-radius: 5px;
        font-size: 1.1rem;
        font-weight: bold;
        cursor: pointer;
        text-transform: uppercase;
        transition: background 0.3s;
        text-decoration: none;
        text-align: center;
        flex-grow: 1;
    }

    .btn-cart:hover {
        background-color: #eacf85;
    }

    .btn-back {
        padding: 15px 20px;
        border: 1px solid #30363d;
        background: transparent;
        color: #8b949e;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s;
    }

    .btn-back:hover {
        border-color: #8b949e;
        color: white;
    }

    /* Version mobile */
    @media (max-width: 768px) {
        .product-container {
            flex-direction: column;
        }
    }
</style>

<div class="product-container">
    
    {{-- Partie GAUCHE : Image --}}
    <div class="product-left">
        @if($product->image)
            <img src="{{ $product->image }}" alt="{{ $product->name }}">
        @else
            <img src="https://via.placeholder.com/400x400?text=Produit+YGO" alt="Pas d'image">
        @endif
    </div>

    {{-- Partie DROITE : Infos et Achat --}}
    <div class="product-right">
        
        @if($product->active)
            <span class="product-category-badge">EN STOCK</span>
        @else
            <span class="product-category-badge" style="background: #da3633;">RUPTURE DE STOCK</span>
        @endif

        <h1>{{ $product->name }}</h1>

        <span class="price-large">{{ $product->price }} €</span>

        <div class="description-text">
            {{ $product->description }}
        </div>

        <div class="action-buttons">
            <a href="#" class="btn-cart">Ajouter au Panier</a>
            <a href="{{ route('products.index') }}" class="btn-back">Retour</a>
        </div>
    </div>

</div>
@endsection