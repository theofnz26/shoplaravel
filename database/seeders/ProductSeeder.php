<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // On récupère une catégorie pour l'associer aux produits [cite: 124-126]
        $displayCat = Category::where('slug', 'display')->first();

        Product::create([
            'name' => 'Display BPRO',
            'description' => 'Boite de 24 boosters de l\'extension BPRO.',
            'price' => 75.00,
            'stock' => 88,
            'active' => true,
            'category_id' => $displayCat->id ?? 1, // Utilise l'ID de la catégorie [cite: 15]
            'image' => 'images/products/Display_BPRO.webp'
        ]);

        Product::create([
            'name' => 'Booster BPRO',
            'description' => 'Boite de 24 boosters de l\'extension BPRO.',
            'price' => 5.00,
            'stock' => 90,
            'active' => true,
            'category_id' => $displayCat->id ?? 2,
            'image' => 'images/products/Booster_BPRO.webp'
        ]);
        
        
        Product::create([
            'name' => 'Display EVO',
            'description' => "Boite de 24 boosters de l'extension EVO.",
            'price' => 79.90,
            'stock' => 30,
            'active' => true,
            'category_id' => $displayCat->id ?? 1,
            'image' => 'images/products/votre_image_evo.webp'
        ]);

        Product::create([
            'name' => 'Display LEGEND',
            'description' => "Boite de 24 boosters de l'extension LEGEND.",
            'price' => 82.50,
            'stock' => 15,
            'active' => true,
            'category_id' => $displayCat->id ?? 1,
            'image' => 'images/products/votre_image_legend.webp'
        ]);

        Product::create([
            'name' => 'Display HERO',
            'description' => "Boite de 24 boosters de l'extension HERO.",
            'price' => 77.00,
            'stock' => 25,
            'active' => true,
            'category_id' => $displayCat->id ?? 1,
            'image' => 'images/products/votre_image_hero.webp'
        ]);

        Product::create([
            'name' => 'Display MYSTIC',
            'description' => "Boite de 24 boosters de l'extension MYSTIC.",
            'price' => 80.00,
            'stock' => 18,
            'active' => true,
            'category_id' => $displayCat->id ?? 1,
            'image' => 'images/products/votre_image_mystic.webp'
        ]);

        Product::create([
            'name' => 'Display FUSION',
            'description' => "Boite de 24 boosters de l'extension FUSION.",
            'price' => 78.50,
            'stock' => 22,
            'active' => true,
            'category_id' => $displayCat->id ?? 1,
            'image' => 'images/products/votre_image_fusion.webp'
        ]);

        Product::create([
            'name' => 'Display SHADOW',
            'description' => "Boite de 24 boosters de l'extension SHADOW.",
            'price' => 76.00,
            'stock' => 19,
            'active' => true,
            'category_id' => $displayCat->id ?? 1,
            'image' => 'images/products/votre_image_shadow.webp'
        ]);

        Product::create([
            'name' => 'Display LIGHT',
            'description' => "Boite de 24 boosters de l'extension LIGHT.",
            'price' => 81.00,
            'stock' => 17,
            'active' => true,
            'category_id' => $displayCat->id ?? 1,
            'image' => 'images/products/votre_image_light.webp'
        ]);

        Product::create([
            'name' => 'Display STORM',
            'description' => "Boite de 24 boosters de l'extension STORM.",
            'price' => 79.00,
            'stock' => 21,
            'active' => true,
            'category_id' => $displayCat->id ?? 1,
            'image' => 'images/products/votre_image_storm.webp'
        ]);

        Product::create([
            'name' => 'Display ARCANE',
            'description' => "Boite de 24 boosters de l'extension ARCANE.",
            'price' => 83.00,
            'stock' => 14,
            'active' => true,
            'category_id' => $displayCat->id ?? 1,
            'image' => 'images/products/votre_image_arcane.webp'
        ]);

        Product::create([
            'name' => 'Display PRIME',
            'description' => "Boite de 24 boosters de l'extension PRIME.",
            'price' => 84.00,
            'stock' => 12,
            'active' => true,
            'category_id' => $displayCat->id ?? 1,
            'image' => 'images/products/votre_image_prime.webp'
        ]);

        Product::create([
            'name' => 'Display NEO',
            'description' => "Boite de 24 boosters de l'extension NEO.",
            'price' => 85.00,
            'stock' => 10,
            'active' => true,
            'category_id' => $displayCat->id ?? 1,
            'image' => 'images/products/votre_image_neo.webp'
        ]);

        Product::create([
            'name' => 'Display VORTEX',
            'description' => "Boite de 24 boosters de l'extension VORTEX.",
            'price' => 86.00,
            'stock' => 8,
            'active' => true,
            'category_id' => $displayCat->id ?? 1,
            'image' => 'images/products/votre_image_vortex.webp'
        ]);

        Product::create([
            'name' => 'Display CRYSTAL',
            'description' => "Boite de 24 boosters de l'extension CRYSTAL.",
            'price' => 87.00,
            'stock' => 6,
            'active' => true,
            'category_id' => $displayCat->id ?? 1,
            'image' => 'images/products/votre_image_crystal.webp'
        ]);

        Product::create([
            'name' => 'Display TITAN',
            'description' => "Boite de 24 boosters de l'extension TITAN.",
            'price' => 88.00,
            'stock' => 4,
            'active' => true,
            'category_id' => $displayCat->id ?? 1,
            'image' => 'images/products/votre_image_titan.webp'
        ]);

        Product::create([
            'name' => 'Display PHOENIX',
            'description' => "Boite de 24 boosters de l'extension PHOENIX.",
            'price' => 89.00,
            'stock' => 2,
            'active' => true,
            'category_id' => $displayCat->id ?? 1,
            'image' => 'images/products/votre_image_phoenix.webp'
        ]);

        Product::create([
            'name' => 'Display OMEGA',
            'description' => "Boite de 24 boosters de l'extension OMEGA.",
            'price' => 90.00,
            'stock' => 1,
            'active' => true,
            'category_id' => $displayCat->id ?? 1,
            'image' => 'images/products/votre_image_omega.webp'
        ]);

        Product::create([
            'name' => 'Display ALPHA',
            'description' => "Boite de 24 boosters de l'extension ALPHA.",
            'price' => 91.00,
            'stock' => 3,
            'active' => true,
            'category_id' => $displayCat->id ?? 1,
            'image' => 'images/products/votre_image_alpha.webp'
        ]);

        Product::create([
            'name' => 'Display ZETA',
            'description' => "Boite de 24 boosters de l'extension ZETA.",
            'price' => 92.00,
            'stock' => 5,
            'active' => true,
            'category_id' => $displayCat->id ?? 1,
            'image' => 'images/products/votre_image_zeta.webp'
        ]);

        Product::create([
            'name' => 'Display SIGMA',
            'description' => "Boite de 24 boosters de l'extension SIGMA.",
            'price' => 93.00,
            'stock' => 7,
            'active' => true,
            'category_id' => $displayCat->id ?? 1,
            'image' => 'images/products/votre_image_sigma.webp'
        ]);

        Product::create([
            'name' => 'Display DELTA',
            'description' => "Boite de 24 boosters de l'extension DELTA.",
            'price' => 94.00,
            'stock' => 9,
            'active' => true,
            'category_id' => $displayCat->id ?? 1,
            'image' => 'images/products/votre_image_delta.webp'
        ]);

        Product::create([
            'name' => 'Display GAMMA',
            'description' => "Boite de 24 boosters de l'extension GAMMA.",
            'price' => 95.00,
            'stock' => 11,
            'active' => true,
            'category_id' => $displayCat->id ?? 1,
            'image' => 'images/products/votre_image_gamma.webp'
        ]);

        Product::create([
            'name' => 'Display BETA',
            'description' => "Boite de 24 boosters de l'extension BETA.",
            'price' => 96.00,
            'stock' => 13,
            'active' => true,
            'category_id' => $displayCat->id ?? 1,
            'image' => 'images/products/votre_image_beta.webp'
        ]);

        // 18 produits ajoutés  
    }
}   
