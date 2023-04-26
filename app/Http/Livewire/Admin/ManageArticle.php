<?php

namespace App\Http\Livewire\Admin;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class ManageArticle extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['deleteArticle' => 'delete'];

    public $search = '', $entries = 10, $status = 'semua', $headline = 'semua', $category = 'semua', $confirmDelete;

    public function mount()
    {
        $this->confirmDelete = false;

        if (request()->input('status') == 'disetujui') {
            $this->status = 1;
        } else if (request()->input('status') == 'belum-disetujui') {
            $this->status = 0;
        }

        if (request()->input('headline') == 'ya') {
            $this->headline = 1;
        } else if (request()->input('headline') == 'tidak') {
            $this->headline = 0;
        }

        if (request()->input('category')) {
            $this->category = request()->input('category');
        }
    }

    public function render()
    {
        $articles = Article::with(['user', 'category'])
            ->when($this->status !== 'semua', function ($query) {
                return $query->where('is_approved', $this->status);
            })
            ->when($this->headline !== 'semua', function ($query) {
                return $query->where('is_headline', $this->headline);
            })
            ->when($this->category !== 'semua', function ($query) {
                $query->whereHas('category', function ($q) {
                    $q->where('name', $this->category);
                });
            })
            ->where(function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function ($query) {
                        $query->where('username', 'like', '%' . $this->search . '%');
                    })->orWhereHas('category', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                    });
            })
            ->paginate($this->entries);

        return view('livewire.admin.manage-article', [
            'articles' => $articles,
            'categories' => Category::orderBy('name')->get()
        ]);
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedStatus()
    {
        $this->resetPage();
    }

    public function updatedHeadline()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $article = Article::find($id);
        Storage::delete($article->thumbnail);

        $article->delete();
    }

    public function updatedConfirmDelete()
    {
        if ($this->confirmDelete) {
            $this->delete($this->articleId);
        }
    }
}
