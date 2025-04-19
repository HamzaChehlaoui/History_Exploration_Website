<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Utilisateur;
use App\Models\Category;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'description',
        'date_publication',
        'category_id',
        'utilisateur_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
    public function images()
    {
        return $this->hasMany(ArticleImage::class, 'article_id');
    }
    /**
 * Get the comments for the article.
 */
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
}
