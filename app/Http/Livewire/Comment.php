<?php

namespace App\Http\Livewire;

use App\Models\Comment as ModelsComment;
use Carbon\Carbon;
use Livewire\Component;

class Comment extends Component
{
    public $comments = [];

    public $newComment = '';

    // Real-time validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'newComment' => 'required|max:255'
        ]);
    }

    public function addComment()
    {
        // if(!$this->newComment)
        // {
        //     return;
        // }

        // array_unshift($this->comments, [
        //     'name' => 'Tun Bo',
        //     'created_at' => Carbon::now()->diffForHumans(),
        //     'body' => $this->body
        // ]);

        $this->validate([
            'newComment' => 'required|max:255'
        ]);

        $createdComment = ModelsComment::create(['name' => $this->newComment, 'user_id' => 1]);

        $this->comments->prepend($createdComment);

        $this->newComment = "";

    }

    public function mount()
    {
        $this->comments = ModelsComment::latest()->get();
        
        // dd($initialComment->user());
    }

    public function render()
    {
        return view('livewire.comment');
    }
}
