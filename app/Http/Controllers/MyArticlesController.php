<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MyArticlesController extends Controller
{
    public function index()
    {
        return view('dashboard.my-articles.index');
    }

    public function create()
    {
        return view('dashboard.my-articles.create', [
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:articles',
            'description' => 'required',
            'thumbnail' => 'required|image|file|max:5120',
            'body' => 'required',
            'category_id' => 'required',
        ], [
            'title.required' => 'Judul berita harus diisi.',
            'title.max' => 'Judul berita tidak boleh lebih dari :max karakter.',
            'slug.required' => 'Slug harus diisi.',
            'slug.unique' => 'Slug sudah digunakan, silakan gunakan slug yang berbeda.',
            'description.required' => 'Deskripsi berita harus diisi.',
            'thumbnail.required' => 'Thumbnail berita harus diisi.',
            'thumbnail.image' => 'Thumbnail berita harus berupa gambar.',
            'thumbnail.file' => 'Thumbnail berita harus berupa file.',
            'thumbnail.max' => 'Ukuran file thumbnail tidak boleh lebih dari 5 MB.',
            'body.required' => 'Isi berita harus diisi.',
            'category_id.required' => 'Kategori berita harus diisi.',
        ]);

        $validatedData['thumbnail'] = $request->file('thumbnail')->store('article-thumbnail');

        $validatedData['user_id'] = Auth::user()->id;

        Article::create($validatedData);

        return redirect()->route('my-articles')->with('success', 'Berita baru berhasil dibuat');
    }

    // Untuk CKEditor
    public function uploadImage()
    {
        $article = new Article();
        $article->id = 0;
        $article->exists = true;

        $images = $article->addMediaFromRequest('upload')->toMediaCollection('images');

        return response()->json([
            'url' => $images->getUrl(),
        ]);
    }

    public function edit($slug)
    {
        $article = Article::where('slug', $slug)->first();

        if ($article->user->id != Auth::user()->id) {
            return abort(403);
        }

        if (!$article) {
            return abort(404);
        }

        return view('dashboard.my-articles.edit', [
            'article' => $article,
            'categories' => Category::get(),
        ]);
    }

    public function update(Request $request, $slug)
    {
        $article = Article::where('slug', $slug)->first();

        $rules = [
            'title' => 'required|max:255',
            'description' => 'required',
            'thumbnail' => 'image|file|max:5120',
            'body' => 'required',
            'category_id' => 'required',
        ];

        if ($request['slug'] != $article['slug']) {
            $rules['slug'] = 'required|unique:articles';
        }

        $validatedData = $request->validate($rules, [
            'title.required' => 'Judul berita harus diisi.',
            'title.max' => 'Judul berita tidak boleh lebih dari :max karakter.',
            'slug.required' => 'Slug harus diisi.',
            'slug.unique' => 'Slug sudah digunakan, silakan gunakan slug yang berbeda.',
            'description.required' => 'Deskripsi berita harus diisi.',
            'thumbnail.image' => 'Thumbnail berita harus berupa gambar.',
            'thumbnail.file' => 'Thumbnail berita harus berupa file.',
            'thumbnail.max' => 'Ukuran file thumbnail tidak boleh lebih dari 5 MB.',
            'body.required' => 'Isi berita harus diisi.',
            'category_id.required' => 'Kategori berita harus diisi.',
        ]);

        if ($request->file('thumbnail')) {
            if ($article->thumbnail) {
                Storage::delete($article->thumbnail);
            }
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('article-thumbnail');
        }

        Article::where('slug', $article->slug)->update($validatedData);

        return redirect()->route('my-articles')->with('success', 'Berita berhasil diedit');
    }
}
