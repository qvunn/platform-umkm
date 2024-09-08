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
            @include('include.search-bar')
            {{-- ? SEARCH BAR END --}}
        </div>
        {{-- # RIGHT CONTAINER END --}}
    </div>

    </div>
@endsection
