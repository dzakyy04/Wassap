<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.index');
    }

    public function show($slug)
    {
        $article = Article::with(['user', 'category'])
            ->where('slug', $slug)
            ->firstOrFail();

        if (!$article->is_approved) {
            if (auth()->user()->id != $article->user->id && auth()->user()->is_admin == false) {
                abort('403');
            }
        }

        $user_articles = Article::with(['user', 'category'])
            ->where('is_approved', true)
            ->where('user_id', $article->user_id)
            ->where('id', '!=', $article->id)
            ->latest()
            ->limit(2)
            ->get();

        $category_articles = Article::with(['user', 'category'])
            ->where('is_approved', true)
            ->where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->latest()
            ->limit(2)
            ->get();

        $this->truncateTitle($user_articles);
        $this->truncateTitle($category_articles);

        return view('articles.show', [
            'article' => $article,
            'user_articles' => $user_articles,
            'category_articles' => $category_articles,
        ]);
    }

    public function truncateTitle(&$articles, $maxChars = 50)
    {
        $articles->each(function ($article) use ($maxChars) {
            if (strlen($article->title) > $maxChars) {
                $article->title = substr($article->title, 0, $maxChars) . '...';
            }
        });
    }
}
