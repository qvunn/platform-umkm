<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:135px; height:135px; object-fit:cover;" class="me-3 avatar-sm rounded-circle"
                    src="{{ $user->getImageURL() }}" alt="{{ $user->name }}">
                <div>
                    <span class="fs-3 fw-bold nav-link mb-0">&#64;{{ $user->username }}</span>
                    <div class="mt-1">
                        <span class="fs-6 text-muted">Bergabung sejak {{ $user->created_at->format('Y') }}</span>
                    </div>
                </div>
            </div>
            <div>
                @auth()
                    @if (Auth::id() === $user->id)
                        <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                    @endif
                @endauth
            </div>
        </div>
        <div class="px-2 mt-4">
            <span class="fs-4 fw-semibold nav-link mb-3">{{ $user->name }}</span>
            <h6 class="mb-0 fw-normal"> Little thing about me: </h6>
            <p class="fs-6 fw-light mt-0">
                {{ $user->bio }}
            </p>
            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                    </span> {{ $user->feeds()->count() }}
                </a>
            </div>
        </div>
    </div>
</div>
