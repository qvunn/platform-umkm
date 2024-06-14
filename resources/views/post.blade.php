@extends('layout.header')
@section('content')
    <div class="row">
        <div class="col-2"> {{-- ? Left Sidebar --}}
            @include('include.left-sidebar')
        </div> {{-- ? Left Sidebar END --}}

        <div class="col-7">
            {{-- ? Submit content --}}
            @include('include.submit-post')
            {{-- ? Submit content END --}}
        </div>

        <div class="col-3">
            <div class="card card-custom"> {{-- ? SEARCH BAR --}}
                <div class="card-header pb-0 border-0">
                    <h5 class="text-white">Image goes here</h5>
                    <hr class="border-primary opacity-100 border-2 mb-0">
                </div>
                <div class="card-body">
                    <input placeholder="Type here" class="text-white bg-dark form-control w-100" type="text"
                        id="search">
                    <button class="btn btn-primary mt-3">Find</button>
                </div>
            </div>
        </div>
    </div>
@endsection
