<div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 offset-3">
                <form wire:submit.prevent="addComment">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    @error('newComment') 
                        <span class="error text-danger text-small">{{ $message }}</span> 
                    @enderror
                    <div class="d-flex">
                        {{-- <input class="form-control mr-2" type="text" wire:model.lazy="newComment"> --}}
                        <input class="form-control mr-2" type="text" wire:model.debounce.500ms="newComment">
                        <button class="btn btn-primary" type="submit">Add</button>
                    </div>
                </form>

                @foreach($comments as $comment)

                <div class="card mt-3">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="mr-3">{{ $comment->user['name'] }}</h5>
                            <span>{{ \Carbon\Carbon::parse($comment['created_at'])->diffForHumans() }}</span>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            wire:click="remove({{ $comment->id }})">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        {{ $comment['name'] }}
                    </div>
                </div>

                @endforeach

                {{ $comments->links('pagination-links') }}

            </div>
        </div>
    </div>
</div>
