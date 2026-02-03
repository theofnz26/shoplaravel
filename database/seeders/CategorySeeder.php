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
                'name' => 'Vêtements',
                'slug' => 'vetements',
                'description' => 'Nos plus beaux t-shirts et pantalons.',
                'created_at' => now(), // now() donne la date et l'heure actuelles
                'updated_at' => now(),
            ],
            [
                'name' => 'Électronique',
                'slug' => 'electronique',
                'description' => 'Gadgets, téléphones et ordinateurs.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Maison',
                'slug' => 'maison',
                'description' => 'Décoration et ameublement.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sport',
                'slug' => 'sport',
                'description' => 'Tout pour garder la forme.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Livres',
                'slug' => 'livres',
                'description' => 'Culture et évasion.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}