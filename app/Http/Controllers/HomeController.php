<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::with(['user', 'category'])->where('is_approved', true)->latest()->take(6)->get();

        foreach ($articles as $article) {
            if (str_word_count($article['title']) > 10) {
                $article['title'] = implode(' ', array_slice(explode(' ', $article['title']), 0, 10)) . '...';
            }
        }

        return view('home.index', [
            'articles' => $articles,
            'categories' => Category::limit(6)->get()
        ]);

    }
}
