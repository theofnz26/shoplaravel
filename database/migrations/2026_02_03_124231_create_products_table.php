<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            
            // Description (Texte long)
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->integer('stock');
            $table->boolean('active')->default(true);
            $table->foreignId('category_id')->constrained();// La liaison avec la table categories (Clé étrangère) constrained() vérifie que l'ID existe vraiment dans la table categories

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
