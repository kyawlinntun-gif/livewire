<?php

namespace App\Http\Livewire;

use App\Models\Comment as ModelsComment;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Comment extends Component
{
    use WithPagination;

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

        ModelsComment::create(['name' => $this->newComment, 'user_id' => 1]);

        // $this->comments->prepend($createdComment);

        $this->newComment = "";

        session()->flash('message', 'Comment was created successfully 😄.');

    }

    public function remove($commentId)
    {
        ModelsComment::find($commentId)->delete();
        // $this->comments = $this->comments->where('id', '!=', $commentId);
        // $this->comments = $this->comments->except($commentId);

        session()->flash('message', 'Comment was deleted successfully 😙.');
    }

    // public function mount()
    // {
    //     $this->comments = ModelsComment::latest()->get();
        
    //     // dd($initialComment->user());
    // }

    public function render()
    {
        return view('livewire.comment',[
            'comments' => ModelsComment::paginate(2),
        ]);
    }
}
