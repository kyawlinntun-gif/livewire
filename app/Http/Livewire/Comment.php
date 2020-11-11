<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Comment extends Component
{
    public $comments = [
        [
            'name' => 'Tun Tun',
            'created_at' => '3 min ago',
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'
        ]
    ];

    public $body = '';

    public function addComment()
    {
        array_unshift($this->comments, [
            'name' => 'Tun Bo',
            'created_at' => Carbon::now()->diffForHumans(),
            'body' => $this->body
        ]);
    }

    public function render()
    {
        return view('livewire.comment');
    }
}
