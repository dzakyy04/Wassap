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
    protected $listeners = ['deleteArticle' => 'delete'];

    public $search = '', $entries = 10, $confirmDelete;

    public function mount()
    {
        $this->confirmDelete = false;
    }

    public function render()
    {
        $articles = Article::with(['user', 'category'])
            ->where('user_id', Auth::user()->id)
            ->where(function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->paginate($this->entries);

        return view('livewire.my-articles.all-articles', [
            'articles' => $articles,
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        Article::find($id)->delete();
    }

    public function updatedConfirmDelete()
    {
        if ($this->confirmDelete) {
            $this->delete($this->articleId);
        }
    }

}
