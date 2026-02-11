@extends('layouts.app')

@section('title', 'Ajouter un nouveau produit')

@section('content')
<div class="container" style="max-width: 600px; margin: 50px auto; color: white; background: #161b22; padding: 30px; border-radius: 8px;">
    <h1 style="margin-bottom: 20px;">Nouveau produit Yu-Gi-Oh!</h1>

    {{-- ⚠️ IMPORTANT : Ajout de enctype="multipart/form-data" pour autoriser l'envoi de fichiers --}}
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="name" style="display: block; margin-bottom: 5px;">Nom du produit</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #30363d; background: #0d1117; color: white;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="price" style="display: block; margin-bottom: 5px;">Prix (€)</label>
            <input type="number" name="price" id="price" step="0.01" value="{{ old('price') }}" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #30363d; background: #0d1117; color: white;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="stock" style="display: block; margin-bottom: 5px;">Stock</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock', 0) }}" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #30363d; background: #0d1117; color: white;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="description" style="display: block; margin-bottom: 5px;">Description</label>
            <textarea name="description" id="description" rows="4" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #30363d; background: #0d1117; color: white;">{{ old('description') }}</textarea>
        </div>

        {{-- Sélecteur de catégorie --}}
        <div style="margin-bottom: 15px;">
            <label for="category_id" style="display: block; margin-bottom: 5px;">Catégorie</label>
            <select name="category_id" id="category_id" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #30363d; background: #0d1117; color: white;">
                <option value="">-- Choisir une catégorie --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- NOUVEAU : Champ d'upload d'image --}}
        <div style="margin-bottom: 15px;">
            <label for="image" style="display: block; margin-bottom: 5px; color: #00d2ff;">Image du produit</label>
            <input type="file" name="image" id="image" accept="image/*" 
                   style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #30363d; background: #0d1117; color: white;">
        </div>

        <div style="margin-bottom: 20px;">
            <label>
                <input type="checkbox" name="active" value="1" {{ old('active') ? 'checked' : '' }}>
                Produit actif (visible en boutique)
            </label>
        </div>

        <button type="submit" style="background: #238636; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; width: 100%; font-weight: bold;">
            CRÉER LE PRODUIT
        </button>

    </form>
</div>
@endsection