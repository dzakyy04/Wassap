<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class ListArticles extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category, $search;

    public function mount(Request $request)
    {
        $this->search = $request->input('cari', '');
        $this->category = $request->input('category', 'semua');
    }

    public function render()
    {
        $articles = Article::with(['user', 'category'])->where('is_approved', true)
            ->latest();

        if ($this->category !== 'semua') {
            $articles->whereHas('category', function ($q) {
                $q->where('slug', $this->category);
            });
        }

        $articles = $articles->where('title', 'like', '%' . $this->search . '%')->paginate(10);

        return view('livewire.articles.list-articles', [
            'articles' => $articles,
            'categories' => Category::get(),
        ]);
    }

    public function setCategory($slug)
    {
        $this->category = $slug;
        $this->resetPage();
    }
}
