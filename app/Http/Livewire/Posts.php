<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class Posts extends Component
{
    public $posts, $body, $post_id;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->posts = Post::query()
            ->where('parent', null)
            ->orderBy('id', 'desc')
            ->get();
        return view('livewire.posts');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->body = '';
        $this->post_id = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'body' => 'required',
        ]);

        Post::updateOrCreate(['id' => $this->post_id], [
            'body' => $this->body
        ]);

        $this->resetInputFields();
    }
}
