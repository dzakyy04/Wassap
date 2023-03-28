<?php

namespace App\Http\Livewire\MyArticles;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class NotApproved extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '', $entries = 10;

    public function render()
    {
        $articles = Article::with(['user', 'category'])
            ->where('user_id', Auth::user()->id)
            ->where('is_approved', false)
            ->where(function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->paginate($this->entries);

        if ($this->search) {
            $this->resetPage();
        }

        return view('livewire.my-articles.not-approved', [
            'articles' => $articles,
        ]);
    }
}
