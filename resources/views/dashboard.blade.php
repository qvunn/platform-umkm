@extends('layout.header')
@section('content')
    <div class="row"> {{-- ! MAIN CONTAINER --}}

        <div class="col-2"> {{-- ? Left Sidebar --}}
            @include('include.left-sidebar')
        </div> {{-- ? Left Sidebar END --}}

        <div class="col-8"> {{-- ! MAIN FEED --}}
            {{-- ? Flash message --}}
            @include('include.success-message')
            {{-- ? Flash message END --}}

            {{-- ? Submit content --}}
            {{-- @include('include.submit-post') --}}
            {{-- ? Submit content END --}}

            {{-- <hr> --}}

            {{-- ? Main content --}}
            @foreach ($feeds as $feed)
                <div class="mb-3">
                    @include('include.content-card')
                </div>
            @endforeach
            <div class="mt-3">
                {{ $feeds->links() }}
            </div>
            {{-- ? Main content --}}
        </div> {{-- ! MAIN FEED END --}}


        <div class="col-2"> {{-- ? RIGHT CONTAINER --}}

            <div class="card"> {{-- ? SEARCH BAR --}}
                <div class="card-body">
                    <p class="fs-5 fw-semibold text-dark">Search</p>
                    {{-- <hr class="border-primary opacity-100 border-2 mb-3"> --}}
                    <input placeholder="Type here" class="text-secondary bg-white-50 form-control w-100" type="text"
                        id="search">
                    <button class="btn btn-primary bg-blue mt-3">Find</button>
                </div>
            </div> {{-- ? SEARCH BAR END --}}

            <div class="card text-dark mt-3"> {{-- ? Categories --}}
                <div class="card-body mx-2">
                    <p class="fs-5 fw-semibold text-dark">Categories</p>
                    <hr class="border-blue opacity-100 border-2 py-0">

                    @foreach ($categories as $cat)
                        <a class="nav-link category-link d-flex align-items-start text-decoration-none py-1"
                            href="{{ route('category', $cat->category_name) }}">
                            <i class="me-3 {{ isset($categoryIcons[$cat->category_name]) ? $categoryIcons[$cat->category_name] : '' }}"
                                style="margin-top: 2px;"></i>
                            <h6 class="fw-medium">
                                {{ $cat->category_name }}
                            </h6>
                        </a>
                    @endforeach
                    <a href="/" class="category-link d-flex align-items-center nav-link text-decoration-none py-1">
                        <i class="fa-solid fa-utensils fa-fw me-3"></i>
                        <h6 class="fw-medium">
                            Show All
                        </h6>
                    </a>
                </div>
            </div> {{-- ? Categories END --}}

        </div>{{-- ? RIGHT CONTAINER END --}}
    </div>

    </div>
@endsection
