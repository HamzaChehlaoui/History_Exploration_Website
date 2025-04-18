<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commande extends Model
{
    use HasFactory;

    protected $table = 'commandes'; 

    protected $fillable = [
        'utilisateur_id',
        'date_commande',
        'total_price',
        'tax',
        'shipping_cost',
        'status',
        'payment_status',
        'payment_method',
        'payment_reference',
        'shipping_address',
        'shipping_city',
        'shipping_state',
        'shipping_zip_code',
        'shipping_country',
        'shipping_method',
        'tracking_number',
        'notes',

    ];

    protected $casts = [
        'date_commande' => 'datetime',
        'total_price' => 'decimal:2',
        'tax' => 'decimal:2',
        'shipping_cost' => 'decimal:2',
    ];


    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class);
    }


    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'commande_produit', 'commande_id', 'produit_id')->withPivot('quantite', 'prix_unitaire');
    }

}
