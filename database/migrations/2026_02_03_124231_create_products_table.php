<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            
            // Nom du produit
            $table->string('name');
            
            // Description (Texte long)
            $table->text('description');
            
            // Prix : On utilise toujours DECIMAL pour l'argent (voir explication plus bas)
            $table->decimal('price', 8, 2);
            
            // Stock (Nombre entier)
            $table->integer('stock');
            
            // Actif ou non (Vrai/Faux), activé par défaut
            $table->boolean('active')->default(true);
            
            // La liaison avec la table categories (Clé étrangère)
            // constrained() vérifie que l'ID existe vraiment dans la table categories
            $table->foreignId('category_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
