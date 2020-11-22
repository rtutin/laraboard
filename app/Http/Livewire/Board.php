<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Board extends Component
{
    public $threads, $body, $threadId;

    public function render()
    {
        $this->threads = Post::query()
            ->where('parent', null)
            ->orderBy('id', 'desc')
            ->get();
        return view('livewire.board');
    }

    public function store()
    {
        $this->validate([
            'body' => 'required',
        ]);

        Post::updateOrCreate(['id' => $this->threadId], [
            'body' => $this->body
        ]);

        session()->flash('message',
            $this->threadId ? 'Post Updated Successfully.' : 'Post Created Successfully.');

        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->body = '';
        $this->threadId = '';
    }
}
