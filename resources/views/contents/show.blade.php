@extends('layout.header')
@section('content')
    <div class="row justify-content-center">

        {{-- # LEFT CONTAINER --}}
        <div class="col-2">
            @include('include.left-sidebar')
        </div>
        {{-- # LEFT CONTAINER END --}}


        {{-- # MAIN FEED --}}
        <div class="col-6 mx-2">
            {{-- ? Flash message --}}
            @include('include.message-success')
            {{-- ? Flash message END --}}

            {{-- ? Main content --}}
            <div class="mb-3">
                <div class="card">
                    <div class="card-body px-3 pt-4 pb-2">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <img style="width:50px; height:50px; object-fit:cover;" class="me-2 avatar-sm rounded-circle"
                                    src="{{ $feed->user->getImageURL() }}" alt="{{ $feed->user->name }}">
                                <div class="card-title mb-0">
                                    <h5 class="fw-bold mb-1">
                                        <a class="nav-link text-decoration-none"
                                            href="{{ route('users.show', $feed->user->id) }}">{{ $feed->user->username }}</a>
                                    </h5>
                                    <h6 class="fw-light">
                                        {{ date('d-m-Y', strtotime($feed->created_at)) }}
                                    </h6>
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
                        <div>
                            @if ($editing ?? false)
                                <form action="{{ route('feeds.update', $feed->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="mb-3">
                                        <textarea name="content" id="content" class="form-control text-secondary" placeholder="Write your story here"
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
                                @if ($feed->images && Storage::disk('public')->exists(json_decode($feed->images)[0]))
                                    <div id="image-carousel" class="d-flex flex-column align-items-center">
                                        <!-- Image display area -->
                                        <div class="border border-2 border-grey mb-3"
                                            style="width: 100%; max-width: 400px;">
                                            <img id="current-image"
                                                src="{{ asset('storage/' . json_decode($feed->images)[0]) }}"
                                                alt="Feed Image"
                                                style="width: 100%; height: auto; max-height: 25vw; object-fit: contain;">
                                        </div>

                                        <!-- Navigation buttons -->
                                        <div class="d-flex">
                                            <button class="btn btn-secondary me-2"
                                                onclick="showPreviousImage()">Previous</button>
                                            <button class="btn btn-secondary" onclick="showNextImage()">Next</button>
                                        </div>
                                    </div>

                                    <script>
                                        const images = @json(json_decode($feed->images)); // Get the images as an array
                                        let currentIndex = 0;

                                        function showPreviousImage() {
                                            currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1; // Loop back to the last image
                                            updateImage();
                                        }

                                        function showNextImage() {
                                            currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0; // Loop back to the first image
                                            updateImage();
                                        }

                                        function updateImage(f) {
                                            const imageElement = document.getElementById('current-image');
                                            imageElement.src = `{{ asset('storage') }}/${images[currentIndex]}`; // Update image source
                                        }
                                    </script>
                                @else
                                    <p>No images available</p>
                                @endif

                                <p class="fs-6 fw-normal mt-2">
                                    {!! nl2br(e($feed->content)) !!}
                                </p>
                            @endif
                        </div>
                        <div class="pb-2">
                            <span class="badge rounded-pill bg-blue ">{{ $feed->category->category_name }}</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <a href="#" class="fw-light nav-link fs-6">
                                    <span class="fas fa-heart me-1"></span>
                                    1000
                                    {{-- {{ $feed->likes }} --}}
                                </a>
                                <a href="{{ route('feeds.show', $feed->id) }}" class="fw-light nav-link fs-6 ms-4">
                                    <span class="fas fa-comment me-1"></span>
                                    {{ $feed->comments()->count() }}
                                </a>
                            </div>
                        </div>
                        <hr class="border-blue opacity-100 border-2">

                        @include('include.comments-box')
                    </div>
                </div>

            </div>
            {{-- ? Main content --}}
        </div>
        {{-- # MAIN FEED END --}}


        {{-- # RIGHT CONTAINER --}}
        <div class="col-3">
            {{-- ? SEARCH BAR --}}
            @include('include.search-bar')
            {{-- ? SEARCH BAR END --}}
        </div>
        {{-- # RIGHT CONTAINER END --}}
    </div>

    </div>
@endsection
