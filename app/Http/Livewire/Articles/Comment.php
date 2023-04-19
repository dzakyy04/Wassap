<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment as ModelsComment;

class Comment extends Component
{
    public $body, $article;

    public function mount($id) {
        $this->article = Article::find($id);
    }
    public function render()
    {
        return view('livewire.articles.comment');
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

        if($comment) {
            session()->flash('success', 'komentar berhasil dibuat');
            return redirect()->route('articles.show', $this->article->slug);
        } else {
            session()->flash('success', 'komentar gagal dibuat');
            return redirect()->route('articles.show', $this->article->slug);
        }
    }


}
