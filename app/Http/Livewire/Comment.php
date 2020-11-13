<?php

namespace App\Http\Livewire;

use App\Models\Comment as ModelsComment;
use Carbon\Carbon;
use Livewire\Component;

class Comment extends Component
{
    public $comments = [];

    public $body = '';

    public function addComment()
    {
        if(!$this->body)
        {
            return;
        }

        array_unshift($this->comments, [
            'name' => 'Tun Bo',
            'created_at' => Carbon::now()->diffForHumans(),
            'body' => $this->body
        ]);

        $this->body = "";

    }

    public function mount()
    {
        $initialComment = ModelsComment::all();
        $this->comments = $initialComment;
        // dd($initialComment->user());
    }

    public function render()
    {
        return view('livewire.comment');
    }
}
