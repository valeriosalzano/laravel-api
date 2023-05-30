@extends('layouts.app')

@section('content')
    <h1 class="display-5 text-center my-3">
        @yield('page-title', 'Admin Page')
    </h1>

    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                @include('partials.sidebar')
            </div>
            
            <div class="col-9">
                @yield('admin-content')
            </div>

        </div>
    </div>
@endsection
