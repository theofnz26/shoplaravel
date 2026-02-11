<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // N'oublie pas cette ligne !

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // On insère un tableau de tableaux (une ligne par catégorie)
        DB::table('categories')->insert([
            [
                'name' => 'Display',
                'slug' => 'Display',
                'description' => 'Boîte de 24 booster.',
                'created_at' => now(), // now() donne la date et l'heure actuelles
                'updated_at' => now(),
            ],
            [
                'name' => 'Booster',
                'slug' => 'Booster',
                'description' => 'Packs de cartes.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Playmate',
                'slug' => 'playmate',
                'description' => 'Tapis de jeu.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Accessoires',
                'slug' => 'Accessoires',
                'description' => 'Accessoires de jeu.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Deck de structure',
                'slug' => 'Deck de structure',
                'description' => 'Deck de structure complet prêt à l\'emploi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}