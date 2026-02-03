{{-- 1. On dit à Laravel : "Utilise le fichier layouts/app.blade.php comme moule" --}}
@extends('layouts.app')

{{-- 2. On définit le titre de la page (optionnel, voir le @yield('title') dans le layout) --}}
@section('title', 'Accueil - ShopLaravel')

{{-- 3. On remplit le "trou" nommé 'content' du layout avec notre code spécifique --}}
@section('content')
    <h1>Bienvenue sur {{ $donnees['nomBoutique'] }} !</h1>
    
    <p>{{ $donnees['description'] }}</p>

    @if($donnees['ouvert'])
        <p style="color: green;">🟢 La boutique est actuellement OUVERTE.</p>
    @else
        <p style="color: red;">🔴 La boutique est actuellement FERMÉE.</p>
    @endif
@endsection