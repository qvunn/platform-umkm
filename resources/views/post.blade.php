@extends('layout.header')
@section('content')
    <div class="row justify-content-center">
        {{-- ? Left Sidebar --}}
        <div class="col-2">
            @include('include.left-sidebar')
        </div>

        <div class="col-6 mx-2">
            {{-- ? Submit content --}}
            @include('include.content-submit')
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
