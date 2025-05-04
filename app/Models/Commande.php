<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_commande',
        'first_name',
        'last_name',
        'email',
        'phone',
        'shipping_address',
        'shipping_city',
        'shipping_state',
        'shipping_zip_code',
        'shipping_country',
        'shipping_method',
        'shipping_cost',
        'tax',
        'total_price',
        'notes',
        'payment_method',
        'payment_reference',
        'payment_status',
        'status',
        'tracking_number',
        'utilisateur_id'
    ];

    

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}
