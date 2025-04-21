<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitImage extends Model
{
    use HasFactory;

    protected $fillable = ['produit_id', 'path'];

    /**
     * Get the produit that owns the image.
     */
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }

    /**
     * Get the full URL for the image.
     */
    public function getUrlAttribute()
    {
        if (filter_var($this->path, FILTER_VALIDATE_URL)) {
            return $this->path;
        }


        return asset('storage/' . $this->path);
    }
}
