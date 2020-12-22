<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PostRating extends Component
{
    public $rating = 0;

    protected $listeners = ['plusPressed', 'minusPressed'];

    public function plusPressed()
    {
        if(auth()->user()) {
            $this->rating = $this->rating + 1;
        }
    }

    public function minusPressed()
    {
        if(auth()->user()) {
            $this->rating = $this->rating - 1;
        }
    }

    public function render()
    {
        return view('livewire.post-rating');
    }
}
