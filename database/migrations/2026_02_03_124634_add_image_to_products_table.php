<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('products', function (Blueprint $table) {
        // On ajoute la colonne image. 
        // nullable() car certains produits n'ont peut-être pas d'image.
        // after() permet de choisir l'emplacement dans la table.
        $table->string('image')->nullable()->after('description'); 
    });
}

public function down(): void
{
    Schema::table('products', function (Blueprint $table) {
        // TRÈS IMPORTANT : Toujours définir comment annuler la modification
        $table->dropColumn('image'); 
    });
}
};
