<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // 1. PROTECTION : Seules ces colonnes peuvent être modifiées via create() ou update()
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'active',
        'category_id',
        'image',
    ];

    // 2. CONVERSION : On force le type de certaines colonnes
    protected $casts = [
        'price' => 'decimal:2', // Le prix sera toujours un nombre décimal à 2 chiffres
        'active' => 'boolean',  // 1 deviendra true, 0 deviendra false
    ];

    // RELATION : Un produit appartient à une catégorie
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}