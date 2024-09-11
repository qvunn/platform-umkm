<div class="card text-dark mt-3">
    <div class="card-body mx-2">
        <p class="fs-5 fw-semibold text-dark">Kategori apa?</p>
        <hr class="border-blue opacity-100 border-2 py-0">
        @foreach ($categories as $category)
            <a class="nav-link category-link d-flex align-items-start text-decoration-none py-1"
                href="{{ route('category', $category->category_name) }}">
                <i class="me-3 {{ isset($categoryIcons[$category->category_name]) ? $categoryIcons[$category->category_name] : '' }}"
                    style="margin-top: 3px"></i>
                <h6 class="fw-medium">
                    {{ $category->category_name }}
                </h6>
            </a>
        @endforeach
        <a href="/" class="category-link d-flex align-items-center nav-link text-decoration-none py-1">
            <i class="fa-solid fa-utensils fa-fw me-3"></i>
            <h6 class="fw-medium">Tampilin semua</h6>
        </a>
    </div>
</div>
