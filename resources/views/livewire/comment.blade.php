<div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 offset-3">
                <form wire:submit.prevent="addComment">
                    @error('newComment') <span class="error text-danger text-small">{{ $message }}</span> @enderror
                    <div class="d-flex">
                        {{-- <input class="form-control mr-2" type="text" wire:model.lazy="newComment"> --}}
                        <input class="form-control mr-2" type="text" wire:model="newComment">
                        <button class="btn btn-primary" type="submit">Add</button>
                    </div>
                </form>

                @foreach($comments as $comment)

                    <div class="card mt-3">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="mr-3">{{ $comment->user['name'] }}</h5><span>{{ \Carbon\Carbon::parse($comment['created_at'])->diffForHumans() }}</span>
                        </div>
                        <div class="card-body">
                            {{ $comment['name'] }}
                        </div>
                    </div>

                @endforeach

            </div>    
        </div>    
    </div>
</div>
