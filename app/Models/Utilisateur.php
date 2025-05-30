<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'utilisateurs';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'imagePath',
    ];

    protected $hidden = [
        'password',
    ];

    /**
 * Get the comments for the user.
 */
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function favorites()
{
    return $this->hasMany(Favorite::class, 'utilisateur_id');
}
public function getProfileImageUrlAttribute()
{
    return $this->imagePath
        ? asset('storage/' . $this->imagePath)
        : 'https://img.freepik.com/photos-gratuite/portrait-guerrier-empire-romain-antique_23-2150912847.jpg?semt=ais_hybrid&w=740';
}

}
