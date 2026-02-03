<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Création de l'utilisateur de test (code par défaut de Laravel)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // 2. Appel de nos Seeders personnalisés
        // L'ordre est important : Catégories AVANT Produits (car un produit a besoin d'une catégorie)
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class, 
        ]);
    }
}