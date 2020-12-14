<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class LoadMoreButton extends Component
{
    public $page;
    public $perPage;
    public $loadMore;

    public function mount($page = 1, $perPage = 1)
    {
        $this->page = $page + 1;
        $this->perPage = $perPage;
        $this->loadMore = false;
    }

    public function loadMore()
    {
        $this->loadMore = true;
    }

    public function render()
    {
        if ($this->loadMore) {
            $posts = Post::paginate($this->perPage, ['*'], null, $this->page);

            return view('livewire.load-more-container', [
                'posts' => $posts
            ]);
        } else {
            return view('livewire.load-more-button');
        }
    }
}