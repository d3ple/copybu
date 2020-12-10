<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PostCard extends Component
{
    public $post;
    public $short = false;

    public function render()
    {
        return view('livewire.post-card');
    }
}
