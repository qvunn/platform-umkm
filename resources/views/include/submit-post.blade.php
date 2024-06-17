{{-- ? Posting --}}
<div class="row px-3">
    <div class="card card-custom">
        <div class="card-body">
            <p class="fs-4 fw-semibold mb-0 text-dark">Share your culinary experience</p>
            <hr class="border-primary opacity-100 border-2 mb-3 mt-2">
            <form action="{{ route('stories.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea name="story" placeholder="Write your story here" class="form-control text-white bg-dark" id="story" rows="3"></textarea>
                    @error('story')
                        <span class="d-block fs-6 mt-2 text-danger">{{ $message }}</span>
                    @enderror
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const textarea = document.getElementById('story');
                            textarea.addEventListener('input', function() {
                                this.style.height = 'auto';
                                this.style.height = this.scrollHeight + 'px';
                            });
                        });
                    </script>
                </div>

                <div class="mb-3">
                    <select name="category" id="category" class="form-control bg-dark text-light">
                        <option value="" disabled selected hidden>Select a category</option>
                        @foreach ($categories as $category)
                            <option class="bg-dark text-light" value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <span class="d-block fs-6 mt-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-md">Share</button>
                </div>
            </form>
        </div>
    </div>
</div>
