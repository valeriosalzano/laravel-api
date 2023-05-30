@extends('layouts.admin')
@section('page-title', 'Show Technology')
@section('admin-content')

    <div class="container py-3 technology-container">

        @include('partials.forms.validation.success_alert')

        <h1 class="fs-1 border-bottom mb-3 py-2 technology-name">
            {{ $technology->name }}
        </h1>
        <h2 class="fs-3">
            {{ $technology->slug }}
        </h2>
        <h3>
            Linked projects: {{count($technology->projects)}}
        </h3>
        <p class="fs-5">
            {{ $technology->description }}
        </p>

        <div class="d-flex row justify-content-between">
            <div class="col">
                <a href="{{ route('admin.technologies.index') }}" class="btn btn-primary w-100">Return to technologies</a>
            </div>
            <div class="col">
                <a class="w-100 btn btn-warning" href="{{ route('admin.technologies.edit', ['technology' => $technology->slug]) }}">
                    Edit technology
                </a>
            </div>
            <div class="col">
                <form action="{{ route('admin.technologies.destroy', ['technology' => $technology->slug]) }}" method="post"
                    class="col delete_form">
                    @csrf
                    @method('DELETE')

                @section('delete-element-name', 'technology')
                @include('partials.forms.sweet_delete.delete_btn')
            </form>
        </div>
    </div>

</div>

@include('partials.forms.sweet_delete.delete_alert')
@endsection
