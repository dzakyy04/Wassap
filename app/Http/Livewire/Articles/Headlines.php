<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use Livewire\Component;

class Headlines extends Component
{
    public function render()
    {
        $articles = Article::with(['user', 'category'])->where('is_approved', true)->latest()->get();

        foreach ($articles as $article) {
            if (str_word_count($article['title']) > 10) {
                $article['title'] = implode(' ', array_slice(explode(' ', $article['title']), 0, 10)) . '...';
            }
        }

        return view('livewire.articles.headlines', [
            'headlines' => $articles->where('is_headline', true),
        ]);
    }
}
