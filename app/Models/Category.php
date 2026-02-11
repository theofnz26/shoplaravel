<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; 

class Category extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    /**
     * Une catégorie a plusieurs produits (One-to-Many).
     
     */
    public function products(): HasMany
    {
        // On utilise la méthode hasMany pour définir la relation 
        return $this->hasMany(Product::class);
    }
}