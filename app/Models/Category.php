<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Article;

class Category extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
