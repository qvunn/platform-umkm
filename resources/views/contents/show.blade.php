@extends('layout.header')
@section('content')
    <div class="row">

        {{-- # LEFT CONTAINER --}}
        <div class="col-2">
            @include('include.left-sidebar')
        </div>
        {{-- # LEFT CONTAINER END --}}


        {{-- # MAIN FEED --}}
        <div class="col-7">
            {{-- ? Flash message --}}
            @include('include.message-success')
            {{-- ? Flash message END --}}

            {{-- ? Main content --}}
            <div class="mb-3">
                @include('include.content-card')
            </div>
            {{-- ? Main content --}}
        </div>
        {{-- # MAIN FEED END --}}


        {{-- # RIGHT CONTAINER --}}
        <div class="col-3">
            {{-- ? SEARCH BAR --}}
            <div class="card">
                <div class="card-body">
                    <p class="fs-5 fw-semibold text-dark">Search</p>
                    {{-- <hr class="border-primary opacity-100 border-2 mb-3"> --}}
                    <input placeholder="Type here" class="text-secondary bg-white-50 form-control w-100" type="text"
                        id="search">
                    <button class="btn btn-primary bg-blue mt-3">Find</button>
                </div>
            </div>
            {{-- ? SEARCH BAR END --}}
        </div>
        {{-- # RIGHT CONTAINER END --}}
    </div>

    </div>
@endsection
