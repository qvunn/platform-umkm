@extends('layout.header')
@section('content')
    <div class="row justify-content-center">

        {{-- ? Left Sidebar --}}
        <div class="col-2">
            @include('include.left-sidebar')
        </div>
        {{-- ? Left Sidebar END --}}


        {{-- ! MAIN FEED --}}
        <div class="col-6 mx-2">
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


        {{-- ? RIGHT CONTAINER --}}
        <div class="col-3">
            {{-- # Categories --}}
            @include('include.category-card')

            {{-- # Recomendation --}}
            <div class="mt-3">
                @include('include.recomend-card')
            </div>
        </div>
    </div>

    </div>
@endsection
