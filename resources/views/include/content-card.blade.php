<div class="card card-custom">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                {{-- <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar"> --}}
                <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ asset('img/logo.png') }}" alt="Avatar">
                <div class="card-title mb-0">
                    <h5>
                        <a class="text-decoration-none text-light" href="#">Alfin</a>
                    </h5>
                </div>
            </div>
            <div class="">
                <form method="POST" action="{{ route('stories.destroy', $feed->id) }}">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm">X</button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body text-light">
        <p class="fs-6 fw-light">
            {{ $feed->contents }}
        </p>
        <div class="pb-2">
            <span class="badge rounded-pill text-bg-primary">{{ $feed->category->category_name }}</span>
        </div>

        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $feed->likes }} </a>
            </div>
            <div>
                <span class="fs-6 fw-light"> <span class="fas fa-clock"> </span>
                    {{ $feed->created_at }} </span>
            </div>
        </div>
        <hr class="border-primary">
        {{-- <div> // Comment
            <div class="mb-3">
                <textarea class="fs-6 form-control" rows="1"></textarea>
            </div>
            <div>
                <button class="btn btn-primary btn-sm"> Post Comment </button>
            </div>

            <hr>
            <div class="d-flex align-items-start">
                <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Luigi" alt="Luigi Avatar">
                <div class="w-100">
                    <div class="d-flex justify-content-between">
                        <h6 class="">Luigi
                        </h6>
                        <small class="fs-6 fw-light text-muted"> 3 hour
                            ago</small>
                    </div>
                    <p class="fs-6 mt-3 fw-light">
                        and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and
                        Evil)
                        by
                        Cicero, written in 45 BC. This book is a treatise on the theory of ethics,
                        very
                        popular during the Renaissan
                    </p>
                </div>
            </div>
        </div> --}}
    </div>
</div>
