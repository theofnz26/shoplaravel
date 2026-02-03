<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Génère un nom de produit composé de 3 mots (ex: "Super Vélo Rouge")
            'name' => fake()->words(3, true), 
            
            // Génère un paragraphe de texte aléatoire
            'description' => fake()->paragraph(), 
            
            // Génère un prix aléatoire entre 10 et 500
            'price' => fake()->randomFloat(2, 10, 500),
            
            // Génère un stock entre 0 et 100
            'stock' => fake()->numberBetween(0, 100),
            
            // 80% de chance d'être actif (visible sur le site)
            'active' => fake()->boolean(80),
            
            // Associe aléatoirement une catégorie existante (ID entre 1 et 5)
            // Attention : cela suppose que tu as déjà créé tes 5 catégories via le Seeder précédent !
            'category_id' => fake()->numberBetween(1, 5),
        ];
    }
}
