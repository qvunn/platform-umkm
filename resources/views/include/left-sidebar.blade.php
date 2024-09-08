<div class="card card-custom overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column gap-1">
            <li class="nav-item">
                <a class="nav-link d-flex align-items-start text-decoration-none icon-link icon-link-hover"
                    style="--bs-icon-link-transform: translate3d(0, -.225rem, 0);" href="#">
                    <i class="bi bi-house me-2 align-bottom"></i>
                    <span class="fs-6 fw-medium">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-start text-decoration-none icon-link icon-link-hover"
                    style="--bs-icon-link-transform: translate3d(0, -.225rem, 0);" href="/">
                    <i class="bi bi-book me-2"></i>
                    <span class="fw-medium">Feeds</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-start text-decoration-none icon-link icon-link-hover"
                    style="--bs-icon-link-transform: translate3d(0, -.225rem, 0);" href="/feeds">
                    <i class="bi bi-plus-circle me-2"></i>
                    <span class="fw-medium">Post</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-start text-decoration-none icon-link icon-link-hover"
                    style="--bs-icon-link-transform: translate3d(0, -.225rem, 0);" href="#">
                    <i class="bi bi-bookmarks me-2"></i>
                    <span class="fw-medium">Saved</span>
                </a>
            </li>
            <hr class="border-blue opacity-100 border-2 mb-0 mt-5 mx-2">
            <li class="nav-item">
                <a class="nav-link d-flex align-items-start text-decoration-none icon-link icon-link-hover"
                    style="--bs-icon-link-transform: translate3d(0, -.225rem, 0);" href="#">
                    <i class="bi bi-person-fill me-2"></i>
                    <span class="fw-medium">Profile</span>
                </a>
            </li>
        </ul>

        {{-- <ul class="nav nav-link-secondary flex-column gap-1">
            @php
                $navItems = [
                    ['icon' => 'bi-house', 'text' => 'Home', 'link' => '#'],
                    ['icon' => 'bi-book', 'text' => 'Feeds', 'link' => '/'],
                    ['icon' => 'bi-plus-circle', 'text' => 'Post', 'link' => '/stories'],
                    ['icon' => 'bi-bookmarks', 'text' => 'Saved', 'link' => '#'],
                    ['icon' => 'bi-person-fill', 'text' => 'Profile', 'link' => '#']
                ];
            @endphp
        
            @foreach ($navItems as $item)
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-start text-decoration-none icon-link icon-link-hover"
                       style="--bs-icon-link-transform: translate3d(0, -.225rem, 0);" href="{{ $item['link'] }}">
                        <i class="bi {{ $item['icon'] }} me-2"></i>
                        <span class="fw-medium">{{ $item['text'] }}</span>
                    </a>
                </li>
            @endforeach
        
            <hr class="border-blue opacity-100 border-2 mb-0 mt-5 mx-2">
        </ul> --}}

    </div>
</div>
