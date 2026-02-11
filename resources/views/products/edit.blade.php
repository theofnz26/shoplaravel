@extends('layouts.app')

@section('title', 'Modifier le produit')

@section('content')
<div class="container" style="max-width: 600px; margin: 50px auto; color: white; background: #161b22; padding: 30px; border-radius: 8px;">
    <h1 style="margin-bottom: 20px;">Modifier : {{ $product->name }}</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label for="name" style="display: block; margin-bottom: 5px;">Nom du produit</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #30363d; background: #0d1117; color: white;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="price" style="display: block; margin-bottom: 5px;">Prix (€)</label>
            <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $product->price) }}" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #30363d; background: #0d1117; color: white;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="stock" style="display: block; margin-bottom: 5px;">Stock</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #30363d; background: #0d1117; color: white;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="description" style="display: block; margin-bottom: 5px;">Description</label>
            <textarea name="description" id="description" rows="4" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #30363d; background: #0d1117; color: white;">{{ old('description', $product->description) }}</textarea>
        </div>

        {{-- OBJECTIF 4 : Sélection de la catégorie avec pré-sélection [cite: 44, 48] --}}
        <div style="margin-bottom: 15px;">
            <label for="category_id" style="display: block; margin-bottom: 5px;">Catégorie</label>
            <select name="category_id" id="category_id" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #30363d; background: #0d1117; color: white;">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="image" style="display: block; margin-bottom: 5px; color: #00d2ff;">Image du produit (Laisse vide pour garder l'actuelle)</label>
            <input type="file" name="image" id="image" accept="image/*" 
                   style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #30363d; background: #0d1117; color: white;">
        </div>

        <div style="margin-bottom: 20px;">
            <label>
                <input type="checkbox" name="active" value="1" {{ old('active', $product->active) ? 'checked' : '' }}>
                Produit actif
            </label>
        </div>

        <button type="submit" style="background: #c5a059; color: #0d1117; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; width: 100%; font-weight: bold;">
            METTRE À JOUR
        </button>
    </form>
</div>
@endsection