<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [
        'name',
        'description',
        'prix',
        'quantite',
    ];

    /**
     * Get the images for the produit.
     */
    public function images()
    {
        return $this->hasMany(ProduitImage::class);
    }

    /**
     * Get the primary image for the produit.
     */
    public function primaryImage()
    {
        return $this->hasOne(ProduitImage::class)->oldest();
    }
}
