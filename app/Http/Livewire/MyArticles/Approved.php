<?php

namespace App\Http\Livewire\MyArticles;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Approved extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '', $entries = 10;

    public function render()
    {
        $articles = Article::with(['user', 'category'])
            ->where('user_id', Auth::user()->id)
            ->where('is_approved', true)
            ->where(function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->paginate($this->entries);

        if ($this->search) {
            $this->resetPage();
        }

        return view('livewire.my-articles.approved', [
            'articles' => $articles
        ]);
    }
}
