<?php
namespace App\Notifications;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ArticleCreated extends Notification
{
    
    use Queueable;

    protected $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'title' => 'New Article Created',
            'article_id' => $this->article->id,
            'message' => 'An article titled "' . $this->article->title . '" has been published.',
        ];
    }
}
