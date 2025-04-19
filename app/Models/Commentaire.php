<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'date_commentaire',
        'utilisateur_id',
        'article_id',
    ];

    /**
     * Get the user that owns the comment.
     */
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    /**
     * Get the article that owns the comment.
     */
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
