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
       Schema::create('categories', function (Blueprint $table) {
            // 1. L'ID (Clé primaire automatique)
            $table->id();

            // 2. Le nom de la catégorie (ex: "Jeux Vidéo")
            $table->string('name');

            // 3. Le Slug (ex: "jeux-video" pour l'URL) - Doit être unique !
            $table->string('slug')->unique();
            
            $table->text('description')->nullable();

            // 4. Les dates automatiques (créé le / modifié le)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
