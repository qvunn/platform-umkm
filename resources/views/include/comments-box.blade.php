<div>
    <form action="{{ route('feeds.comments.store', $feed->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
        </div>
    </form>
    <hr>
    @foreach ($feed->comments as $comment)
        <div class="d-flex align-items-start">
            <img style="width:35px; height:35px; object-fit:cover;" class="me-3 mt-1 avatar-sm rounded-circle"
                src="{{ $comment->user->getImageURL() }}" alt="{{ $comment->user->name }}">
            <div class="w-100">
                <div class="d-flex">
                    <h6 class="mb-0">
                        <a class="nav-link text-decoration-none fw-bold"
                            href="{{ route('users.show', $comment->user->id) }}">
                            {{ $comment->user->username }}
                        </a>
                    </h6>
                    <h6 class="fs-6 fw-light text-muted ms-2">
                        {{ $comment->created_at->diffForHumans() }}
                    </h6>
                </div>
                <h6 class="mt-1 fw-normal">
                    {{ $comment->content }}
                </h6>
            </div>
        </div>
    @endforeach
</div>
