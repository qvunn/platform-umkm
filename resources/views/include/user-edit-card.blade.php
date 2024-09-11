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
                        <input name="name" value="{{ $user->name }}" type="text" class="form-control">
                        @error('name')
                            <span class="text-danger fs-6">{{ $message }}</span>
                        @enderror
                        <div class="mt-1">
                            <span class="fs-6 text-muted">Bergabung sejak {{ $user->created_at->format('Y') }}</span>
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
            <div class="mt-4">
                <label for="">Profile Picture</label>
                <input type="file" name="image" class="form-control">
                @error('iamge')
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
