@extends('layouts.app')

@section('title', 'Nos Produits - ShopLaravel')

@section('content')
    <h1>Liste des produits de la boutique</h1>

    <ul>
        @forelse($lesProduits as $produit)
            <li>
                <strong>{{ $produit['name'] }}</strong> : {{ $produit['price'] }} € 
                <em>(Identifiant : {{ $produit['id'] }})</em>
            </li>
        @empty
            <li>Désolé, aucun produit n'est disponible pour le moment.</li>
        @endforelse
    </ul>
@endsection