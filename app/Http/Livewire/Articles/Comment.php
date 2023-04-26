<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment as ModelsComment;

class Comment extends Component
{
    public $body, $body2, $article, $edit_comment_id, $confirmDelete, $comment_id;
    protected $listeners = ['deleteComment' => 'delete'];

    public function mount($id)
    {
        $this->confirmDelete = false;
        $this->article = Article::find($id);
    }
    public function render()
    {
        return view('livewire.articles.comment', [
            'comments' => ModelsComment::with(['user', 'childrens'])
                ->where('article_id', $this->article->id)
                ->whereNull('comment_id')
                ->get(),
            'total_comments' => ModelsComment::with(['user'])->where('article_id', $this->article->id)->count(),
        ]);
    }

    public function store()
    {
        $this->validate([
            'body' => 'required'
        ], [
            'body.required' => 'Komentar tidak boleh kosong'
        ]);

        $comment = ModelsComment::create([
            'user_id' => Auth::user()->id,
            'article_id' => $this->article->id,
            'body' => $this->body
        ]);

        if ($comment) {
            $this->emit('comment_store', $comment->id);
            $this->body = NULL;
        } else {
            session()->flash('danger', 'komentar gagal dibuat');
            return redirect()->route('articles.show', $this->article->slug);
        }
    }

    public function selectEdit($id)
    {
        $comment = ModelsComment::find($id);
        $this->edit_comment_id = $comment->id;
        $this->body2 = $comment->body;
        $this->comment_id = null;
    }

    public function change()
    {
        $this->validate([
            'body2' => 'required'
        ], [
            'body2.required' => 'Komentar tidak boleh kosong'
        ]);

        $comment = ModelsComment::where('id', $this->edit_comment_id)->update([
            'body' => $this->body2
        ]);

        if ($comment) {
            $this->emit('comment_edit', $this->edit_comment_id);
            $this->body = NULL;
            $this->edit_comment_id = NULL;
        } else {
            session()->flash('danger', 'komentar gagal diubah');
            return redirect()->route('articles.show', $this->article->slug);
        }
    }

    public function delete($id)
    {
        $comment = ModelsComment::where('id', $id)->delete();

        if ($comment) {
            return NULL;
        }
    }

    public function updatedConfirmDelete()
    {
        if ($this->confirmDelete) {
            $this->delete($this->articleId);
        }
    }

    public function selectReply($id)
    {
        $this->comment_id = $id;
        $this->edit_comment_id = null;
        $this->body2 = null;
    }

    public function reply()
    {
        $this->validate([
            'body2' => 'required'
        ], [
            'body2.required' => 'Komentar tidak boleh kosong'
        ]);

        $comment = ModelsComment::find($this->comment_id);
        $comment = ModelsComment::create([
            'user_id' => Auth::user()->id,
            'article_id' => $this->article->id,
            'body' => $this->body2,
            'comment_id' => $comment->comment_id ? $comment->comment_id : $comment->id
        ]);

        if ($comment) {
            $this->emit('comment_store', $comment->id);
            $this->body2 = NULL;
            $this->comment_id = NULL;
        } else {
            session()->flash('danger', 'komentar gagal dibuat');
            return redirect()->route('articles.show', $this->article->slug);
        }
    }
}
