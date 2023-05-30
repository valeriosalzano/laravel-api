@extends('layouts.admin')

@section('page-title', 'Dashboard')
@section('admin-content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
@endsection
