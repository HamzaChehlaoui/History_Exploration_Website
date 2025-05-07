<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{

    protected $table = 'produits';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
        'prix',
        'quantite',
        'imagePath',
        'category_id',
    ];
    public function commandes()
{
    return $this->belongsToMany(Commande::class)->withPivot('quantite', 'prix_unitaire')->withTimestamps();
}


}
