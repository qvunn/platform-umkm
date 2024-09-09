{{-- <nav class="navbar navbar-expand-lg bg-primary ticky-top bg-body-tertiary" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand fw-light" href="/">
            <span class="fas fa-brain me-1"> </span>{{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/profile">Profile</a>
                </li>
            </ul>
        </div>
    </div>
</nav> --}}

<nav class="navbar navbar-expand-lg ticky-top">
    <div class="container">
        <div class="col">
            <div class="d-flex justify-content-center">
                <a class="pt-0" href="/">
                    <img id="logo" class="img-fluid mx-auto" src="{{ asset('img/logo.png') }}" width="100"
                        alt="Logo">
                </a>
            </div>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="text-dark nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-dark nav-link active" aria-current="page" href="/">Feed</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-dark nav-link active" aria-current="page" href="/">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-dark nav-link active" aria-current="page" href="/">Terms</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-dark nav-link active" aria-current="page" href="/">Contact</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/login">Login</a>
                        </li>
                    @endguest
                </ul>
            </div>
            <hr class="border-blue opacity-100 border-3 mb-0">
        </div>
    </div>
</nav>
