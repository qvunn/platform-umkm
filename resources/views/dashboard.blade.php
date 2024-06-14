@extends('layout.header')
@section('content')
    <div class="row"> {{-- ! MAIN CONTAINER --}}

        <div class="col-2"> {{-- ? Left Sidebar --}}
            @include('include.left-sidebar')
        </div> {{-- ? Left Sidebar END --}}

        <div class="col-7"> {{-- ! MAIN FEED --}}
            {{-- ? Flash message --}}
            @include('include.success-message')
            {{-- ? Flash message END --}}

            {{-- ? Submit content --}}
            {{-- @include('include.submit-post') --}}
            {{-- ? Submit content END --}}

            {{-- <hr> --}}

            {{-- ? Main content --}}
            @foreach ($feeds as $feed)
                <div class="center-container">
                    <div class="mb-3">
                        @include('include.content-card')
                    </div>
                </div>
            @endforeach
            <div class="mt-3">
                {{ $feeds->links() }}
            </div>
            {{-- ? Main content --}}
        </div> {{-- ! MAIN FEED END --}}


        <div class="col-3"> {{-- ? RIGHT CONTAINER --}}

            <div class="card card-custom"> {{-- ? SEARCH BAR --}}
                <div class="card-header pb-0 border-0">
                    <h5 class="text-light">Search something?</h5>
                    <hr class="border-primary opacity-100 border-2 mb-0">
                </div>
                <div class="card-body">
                    <input placeholder="Type here" class="text-light bg-dark form-control w-100" type="text" id="search">
                    <button class="btn btn-primary mt-3">Find</button>
                </div>
            </div> {{-- ? SEARCH BAR END --}}

            <div class="card card-custom text-light mt-3"> {{-- ? Categories --}}
                <div class="card-header pb-0 border-0">
                    <h5>Categories</h5>
                    <hr class="border-primary opacity-100 border-2 mb-0">
                </div>
                <div class="card-body">
                    @foreach ($categories as $cat)
                        <a class="text-light text-decoration-none" href="{{ route('category', $cat->category_name) }}">
                            <h6>
                                {{ $cat->category_name }}
                            </h6>
                        </a>
                    @endforeach
                    <a href="/" class="text-light text-decoration-none">
                        <h6>Show All</h6>
                    </a>
                </div>
            </div> {{-- ? Categories END --}}

        </div>{{-- ? RIGHT CONTAINER END --}}
    </div>

    </div>
@endsection
