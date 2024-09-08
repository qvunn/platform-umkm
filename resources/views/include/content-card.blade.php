<div class="card">
    <div class="card-body px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                {{-- <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar"> --}}
                <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ asset('img/logo.png') }}"
                    alt="Avatar">
                <div class="card-title mb-0">
                    <h5 class="fw-semibold">
                        <a class="nav-link text-decoration-none" href="#">Alfin Ahsanul</a>
                    </h5>
                </div>
            </div>
            <div class="">
                <form method="POST" action="{{ route('feeds.destroy', $feed->id) }}">
                    @csrf
                    @method('delete')
                    <a class="mx-2" href="{{ route('feeds.edit', $feed->id) }}">Edit</a>
                    <a href="{{ route('feeds.show', $feed->id) }}">View</a>
                    <button class="ms-1 btn btn-danger btn-sm">X</button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body text-dark">
        @if ($editing ?? false)
            <form action="{{ route('feeds.update', $feed->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea name="content" placeholder="Write your story here" class="form-control text-secondary" id="content"
                        rows="7">{{ old('content', $feed->content) }}</textarea>
                    @error('content')
                        <span class="d-block fs-6 mt-2 text-danger">{{ $message }}</span>
                    @enderror
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const textarea = document.getElementById('feed');
                            textarea.addEventListener('input', function() {
                                this.style.height = 'auto';
                                this.style.height = this.scrollHeight + 'px';
                            });
                        });
                    </script>
                </div>

                <div class="mb-3">
                    <select name="category" id="category" class="form-control">
                        <option class="text-secondary" value="" disabled selected hidden>
                            Select a category
                        </option>
                        @foreach ($categories as $category)
                            <option class="text-secondary hover-none" value="{{ $category->id }}"
                                {{ old('category', $feed->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <span class="d-block fs-6 mt-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-primary bg-blue btn-sm mb-2">Update</button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-normal">
                {!! nl2br(e($feed->content)) !!}
            </p>
        @endif
        <div class="pb-2">
            <span class="badge rounded-pill bg-blue ">{{ $feed->category->category_name }}</span>
        </div>

        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $feed->likes }} </a>
            </div>
            <div>
                <span class="fs-6 fw-light">
                    {{ date('d-m-Y', strtotime($feed->created_at)) }}
                </span>
            </div>
        </div>
        <hr class="border-blue opacity-100 border-2">
        
        @include('include.comments-box')
    </div>
</div>
