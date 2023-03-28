<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyArticlesController extends Controller
{
    public function index()
    {
        return view('dashboard.my-articles.index');
    }

    public function approved()
    {
        return view('dashboard.my-articles.approved');
    }

    public function not_approved()
    {
        return view('dashboard.my-articles.not-approved');
    }

    public function create()
    {
        return view('dashboard.my-articles.create', [
            'categories' => Category::get(),
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
        return redirect()->route('my-articles');
    }

    // Untuk CKEditor
    public function uploadImage() {
        $article = new Article();
        $article->id = 0;
        $article->exists = true;

        $images = $article->addMediaFromRequest('upload')->toMediaCollection('images');

        return response()->json([
            'url' => $images->getUrl()
        ]);
    }
}
