<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;

class ManageCategory extends Component
{
    public function render()
    {
        return view('livewire.admin.manage-category', [
            'categories' => Category::get()
        ]);
    }
}
