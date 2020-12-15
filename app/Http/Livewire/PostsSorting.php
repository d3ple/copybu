<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PostsSorting extends Component
{
    protected $listeners = ['sortTypeClicked'];

    public $route = "posts.index";

    public function sortTypeClicked($type)
    {
        return redirect(route($this->route, ['sort' => $type]));
    }

    public function render()
    {
        return view('livewire.posts-sorting');
    }
}
