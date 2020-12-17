<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PostComment extends Component
{
    public $comment;
    public $post;
    public $subcomment = false;
    public $top = false;

    public function render()
    {
        return view('livewire.post-comment');
    }
}
