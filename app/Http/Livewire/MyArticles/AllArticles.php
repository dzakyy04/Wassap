<?php

namespace App\Http\Livewire\MyArticles;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class AllArticles extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.my-articles.all-articles', [
            'articles' => Article::with(['user', 'category'])->where('user_id', Auth::user()->id)->paginate(2),
        ]);
    }
}
