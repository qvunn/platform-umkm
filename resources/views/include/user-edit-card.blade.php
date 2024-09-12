<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageURL() }}"
                        alt="{{ $user->name }}">

                    {{-- # Input name --}}
                    <div>
                        <div class="mb-0">
                            <label for="">Type your display username</label>
                            <input name="username" value="{{ old('username', $user->username) }}" type="text"
                                class="form-control">
                            @error('username')
                                <span class="text-danger fs-6">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="name">Type your name</label>
                            <input name="name" value="{{ old('name', $user->name) }}" type="text"
                                class="form-control">
                            @error('name')
                                <span class="text-danger fs-6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div>
                    @auth()
                        @if (Auth::id() === $user->id)
                            <a href="{{ route('users.show', $user->id) }}">View</a>
                        @endif
                    @endauth
                </div>
            </div>

            {{-- # Photo profile --}}
            {{-- <div class="mt-4">
                <label for="">Profile Picture</label>
                <input type="file" name="image" class="form-control">
                @error('image')
                    <span class="text-danger fs-6">{{ $message }}</span>
                @enderror
            </div> --}}
            <div class="mb-3">
                <label for="image">Profile Picture</label>

                <!-- Display the current image if it exists -->
                @if ($user->image)
                    <div class="mb-2">
                        <img src="{{ $user->getImageURL() }}" alt="Profile Picture"
                            style="width: 150px; height: 150px; object-fit: cover;" class="rounded-circle">
                    </div>
                @endif

                <!-- File input for a new image -->
                <input type="file" name="image" class="form-control">

                <!-- Display validation error for image if exists -->
                @error('image')
                    <span class="text-danger fs-6">{{ $message }}</span>
                @enderror
            </div>


            {{-- # Bio --}}
            <div class="px-2 mt-4">
                <h5 class="fs-5"> Little thing about me: </h5>
                <div class="mb-3">
                    <textarea name="bio" id="bio" class="form-control text-secondary" rows="3">{{ old('bio', $user->bio) }}</textarea>
                    @error('bio')
                        <span class="d-block fs-6 mt-2 text-danger">{{ $message }}</span>
                    @enderror
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const textarea = document.getElementById('bio');
                            textarea.addEventListener('input', function() {
                                this.style.height = 'auto';
                                this.style.height = this.scrollHeight + 'px';
                            });
                        });
                    </script>
                </div>
                <button class="btn btn-dark btn-sm mb-3">Save</button>
                <div class="d-flex justify-content-start">
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                        </span> {{ $user->feeds()->count() }}
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
