@auth()
    <div class="row px-3">
        <div class="card card-custom">
            <div class="card-body">
                <p class="fs-4 fw-semibold mb-0 text-dark">Share your culinary experience</p>
                <hr class="border-blue opacity-100 border-2 mb-3 mt-2">
                <form action="{{ route('feeds.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- # Upload content --}}
                    <div class="mb-3">
                        <textarea name="content" placeholder="Write your story here" class="form-control text-secondary" id="content"
                            rows="7">{{ old('content') }}</textarea>
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

                    {{-- # Upload image --}}
                    <div class="mb-3">
                        <!-- File input for a new image with a limit of 4 images -->
                        <input type="file" name="images[]" multiple="multiple" accept="image/*" class="form-control"
                            id="images" onchange="validateFileCount(this)" max="4">

                        <!-- Display validation error for images if exists -->
                        @error('images')
                            <span class="text-danger fs-6">{{ $message }}</span>
                        @enderror

                        <!-- Placeholder for custom error message -->
                        <span id="file-error-message" class="text-danger fs-6"></span>

                        <script>
                            function validateFileCount(input) {
                                const errorMessage = document.getElementById('file-error-message');
                                if (input.files.length > 4) {
                                    errorMessage.textContent = 'You can only upload up to 4 images.';
                                    input.value = ''; // Clear the input if more than 4 images are selected
                                } else {
                                    errorMessage.textContent = ''; // Clear the error message if valid
                                }
                            }
                        </script>
                    </div>

                    {{-- # Upload category --}}
                    <div class="mb-3">
                        <select name="category" id="category" class="form-control">
                            <option class="text-secondary" value="" disabled selected hidden>
                                Select a category
                            </option>
                            @foreach ($categories as $category)
                                <option class="text-secondary hover-none" value="{{ $category->id }}"
                                    {{ old('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="d-block fs-6 mt-2 text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- # Button --}}
                    <div>
                        <button type="submit" class="btn btn-primary bg-blue btn-md">Share</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endauth
