<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Autorise la modification de ces colonnes
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    // RELATION : Une catégorie contient plusieurs produits
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}