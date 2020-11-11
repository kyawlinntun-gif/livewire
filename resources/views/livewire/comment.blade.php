<div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="d-flex">
                    <input class="form-control mr-2" type="text" wire:model="body">
                    <button class="btn btn-primary" type="button" wire:click="addComment">Add</button>
                </div>

                @foreach($comments as $comment)

                    <div class="card mt-3">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="mr-3">{{ $comment['name'] }}</h5><span>{{ $comment['created_at'] }}</span>
                        </div>
                        <div class="card-body">
                            {{ $comment['body'] }}
                        </div>
                    </div>

                @endforeach

            </div>    
        </div>    
    </div>
</div>
