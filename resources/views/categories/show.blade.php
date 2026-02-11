@extends('layouts.app')

@section('title', 'Archétype : ' . $category->name)

@section('content')
<div class="store-container">
    {{-- Titre et Description de la catégorie [cite: 33] --}}
    <h1 class="section-title">Archétype : {{ $category->name }}</h1>
    <p style="color: #8b949e; margin-bottom: 30px; padding-left: 20px;">
        {{ $category->description }}
    </p>

    {{-- Liste des produits de cette catégorie [cite: 34] --}}
    <div class="products-grid">
        @forelse($lesProduits as $produit)
            <article class="product-card">
                <div class="product-image-wrapper">
                    @if($produit->image)
                        <img src="{{ Str::startsWith($produit->image, 'http') ? $produit->image : asset($produit->image) }}" alt="{{ $produit->name }}">
                    @else
                        <img src="https://via.placeholder.com/300x400?text=No+Card" alt="Pas d'image">
                    @endif
                </div>

                <div class="product-info" style="padding: 20px;">
                    <h2 style="color: white; font-size: 1.2rem; margin-bottom: 10px;">{{ $produit->name }}</h2>
                    <div class="price" style="color: #e8b046; font-size: 1.3rem; font-weight: bold; margin-bottom: 15px;">
                        {{ $produit->price }} €
                    </div>
                    <a href="{{ route('products.show', $produit->id) }}" class="btn-details" style="display: block; text-align: center; border: 1px solid #00d2ff; color: #00d2ff; text-decoration: none; padding: 8px; border-radius: 4px;">
                        VOIR LA CARTE
                    </a>
                </div>
            </article>
        @empty
            <p style="color: #8b949e; padding-left: 20px;">Aucune carte ne correspond à cet archétype pour le moment.</p>
        @endforelse
    </div>
</div>
@endsection