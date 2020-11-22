<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Thread extends Component
{
    public $posts;

    public function render()
    {
        return view('livewire.thread');
    }

    public function mount($id)
    {
        $this->posts = Post::query()->where('parent', $id)->get();
    }
}
