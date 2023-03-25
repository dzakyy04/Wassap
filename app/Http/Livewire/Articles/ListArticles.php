<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ListArticles extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $articles = Article::with(['user', 'category'])->where('is_approved', true)->latest()->paginate(6);

        foreach ($articles as $article) {
            if (str_word_count($article['title']) > 10) {
                $article['title'] = implode(' ', array_slice(explode(' ', $article['title']), 0, 10)) . '...';
            }

            if (strlen($article['description']) > 100) {
                $article['description'] = substr($article['description'], 0, 100) . '...';
            }

        }

        return view('livewire.articles.list-articles', [
            'articles' => $articles,
        ]);
    }
}
