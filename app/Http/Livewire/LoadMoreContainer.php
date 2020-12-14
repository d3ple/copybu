<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class LoadMoreContainer extends Component
{
    public $page;
    public $perPage;

    public function mount($page, $perPage)
    {
        $this->page = $page ? $page : 1;
        $this->perPage = $perPage ? $perPage : 1;
    }

    public function render()
    {
        $posts = Post::paginate($this->perPage, ['*'], null, $this->page);

        return view('livewire.load-more-container', [
            'posts' => $posts,
            'page' => $this->page
        ]);
    }
}
