<div class="card">
    <div class="card-body px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                {{-- # Profile photo --}}
                <img style="width:50px; height:50px; object-fit:cover;" class="me-2 avatar-sm rounded-circle"
                    src="{{ $feed->user->getImageURL() }}" alt="{{ $feed->user->name }}">

                {{-- # Display username, etc --}}
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
            {{-- @if ($editing ?? false)
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
            @else --}}

            @if ($feed->images && ($imagesArray = json_decode($feed->images)))
                <div class="image-gallery">
                    {{-- # Display single image --}}
                    @if (count($imagesArray) === 1)
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('storage/' . $imagesArray[0]) }}" alt="Feed Image"
                                class="rounded omg-fluid"
                                style="
                                width: 100%;
                                max-width: 100vh;
                                height: auto;
                                max-height: 25vw;
                                object-fit: contain;">
                        </div>

                        {{-- # Display two images (side-by-side) --}}
                    @elseif (count($imagesArray) === 2)
                        <div class="row g-1">
                            @foreach ($imagesArray as $image)
                                <div class="col-6"> <!-- Each image will take up 50% of the width -->
                                    <div class="d-flex justify-content-center gap-0">
                                        <img src="{{ asset('storage/' . $image) }}" alt="Feed Image"
                                            class="rounded img-fluid"
                                            style="width: 100%; max-width:100vh; height: auto; max-height: 25vw; object-fit: cover;">
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- # Display three images (one large on the left, two stacked on the right) --}}
                    @elseif (count($imagesArray) === 3)
                        <div class="d-flex col" style="height: 25vw">
                            <div>
                                <img src="{{ asset('storage/' . $imagesArray[0]) }}" alt="Feed Image"
                                    class="rounded img-fluid"
                                    style="width: 50vh; max-width:; height: 100%; object-fit: cover;">
                            </div>
                            <div>
                                @for ($i = 1; $i < 3; $i++)
                                    <div class="mb-1" style="max-height: 25vw">
                                        <img src="{{ asset('storage/' . $imagesArray[$i]) }}" alt="Feed Image"
                                            class="rounded img-fluid ms-1"
                                            style="width: 30vh; max-width:100vh; height: 30vh; max-height: 12.4vw; object-fit: cover;">
                                    </div>
                                @endfor
                            </div>
                        </div>

                        {{-- # Display four images in a 2x2 grid --}}
                    @elseif (count($imagesArray) === 4)
                        <div class="d-grid gap-1"
                            style="grid-template-columns: repeat(2, 1fr); grid-template-rows: repeat(2, 1fr); width: 100%; height: 100%; max-height: 25vw;">
                            @foreach ($imagesArray as $image)
                                <div class="grid-item">
                                    <img src="{{ asset('storage/' . $image) }}" alt="Feed Image"
                                        class="img-fluid rounded" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @else
                <p>No images available</p>
            @endif


            <p class="fs-6 fw-normal mt-2">
                {!! nl2br(e($feed->content)) !!}
            </p>


            {{-- @endif --}}
        </div>

        {{-- # Category name --}}
        <div class="pb-2">
            <span class="badge rounded-pill bg-blue ">{{ $feed->category->category_name }}</span>
        </div>

        <div class="d-flex justify-content-between">
            <div class="d-flex">
                {{-- # Like count --}}
                <a href="#" class="fw-light nav-link fs-6">
                    <span class="fas fa-heart me-1"></span>
                    1000
                    {{-- {{ $feed->likes }} --}}
                </a>
                {{-- # Comment count --}}
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
