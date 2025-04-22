<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Utilisateur extends Authenticatable
{
    use HasFactory;

    protected $table = 'utilisateurs';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',

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
public function profileImage()
    {
        return $this->hasOne(UserImage::class, 'utilisateur_id');
    }

}

