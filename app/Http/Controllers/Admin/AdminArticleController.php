<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminArticleController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.admin.articles.index');
    }

    public function edit($slug)
    {
        $this->authorize('admin');
        $article = Article::where('slug', $slug)->first();
        return view('dashboard.admin.articles.edit', [
            'article' => $article,
            'categories' => Category::get(),
        ]);
    }

    public function update(Request $request, $slug)
    {
        $article = Article::where('slug', $slug)->first();
        $rules = [
            'is_approved' => 'required',
            'is_headline' => 'required',
        ];

        $validatedData = $request->validate($rules);
        Article::where('slug', $article->slug)->update($validatedData);

        return redirect()->route('admin.article')->with('success', 'Status berhasil diubah');
    }
}
