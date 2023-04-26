<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ManageAdmin extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '', $entries = 10;

    public function render()
    {
        return view('livewire.admin.manage-admin', [
            'admins' => User::with('articles')
                ->where('is_admin', true)
                ->where(function ($query) {
                    $query->where('username', 'like', '%' . $this->search . '%')
                        ->orWhere('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%');
                })
                ->paginate($this->entries),
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
