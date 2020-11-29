<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Board;

class Boards extends Component
{
    public $boards = [], $route, $name, $bump_limit, $thread_limit, $hidden = false, $description;

    public function render()
    {
        $this->boards = Board::all();
        return view('livewire.boards');
    }

    public function store()
    {
        $this->validate([
            'route' => 'required|unique:boards',
            'name' => 'required|unique:boards',
            'bump_limit' => 'required',
            'thread_limit' => 'required',
            'description' => 'required|unique:boards',
        ]);

        Board::create(['route' => $this->route], [
            'owner_id' => auth()->user()->id,
            'route' => $this->route,
            'name' => $this->name,
            'bump_limit' => $this->bump_limit,
            'thread_limit' => $this->thread_limit,
            'hidden' => $this->hidden,
            'description' => $this->description,
            'post_count' => 0,
        ]);

        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->route = '';
        $this->name = '';
        $this->bump_limit = '';
        $this->thread_limit = '';
        $this->hidden = '';
        $this->description = '';
    }
}
