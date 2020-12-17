<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PostComments extends Component
{
    public $comments;
    public $post;

    public function render()
    {
        return view('livewire.post-comments');
    }
}
