@extends('layout.header')
@section('content')
    <div class="row">

        {{-- ? Left Sidebar --}}
        <div class="col-2">
            @include('include.left-sidebar')
        </div>
        {{-- ? Left Sidebar END --}}


        {{-- ! MAIN FEED --}}
        <div class="col-7">
            {{-- # SEARCH BAR --}}
            @include('include.search-bar')
            
            {{-- # Flash message --}}
            @include('include.message-success')

            {{-- ? Main content --}}
            @forelse($feeds as $feed)
                <div class="my-3">
                    @include('include.content-card')
                </div>
            @empty
                <div class="card my-3">
                    <p class="my-3 text-center">
                        Yahh ngga ada.
                    </p>
                </div>
            @endforelse
            <div class="mt-3">
                {{ $feeds->withQueryString()->links() }}
            </div>
            {{-- ? Main content --}}
        </div>
        {{-- ! MAIN FEED END --}}


        <div class="col-3"> {{-- ? RIGHT CONTAINER --}}
            {{-- # SEARCH BAR --}}
            @include('include.search-bar')
            {{-- # Categories --}}
            @include('include.category-card')
        </div>{{-- ? RIGHT CONTAINER END --}}
    </div>

    </div>
@endsection
