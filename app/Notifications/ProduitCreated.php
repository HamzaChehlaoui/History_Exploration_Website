<?php
namespace App\Notifications;

use App\Models\Produit;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ProduitCreated extends Notification
{
    use Queueable;

    protected $produit;

    public function __construct(Produit $produit)
    {
        $this->produit = $produit;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'title' => 'New Product Added',
            'produit_id' => $this->produit->id,
            'message' => 'A product named "' . $this->produit->name . '" has been added to the store.',
        ];
    }
}
