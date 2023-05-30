@extends('layouts.admin')
@section('page-title', 'Show Types')
@section('admin-content')

    <div class="container py-3 type-container">

        @include('partials.forms.validation.success_alert')

        <h1 class="fs-1 border-bottom mb-3 py-2 type-name">
            {{ $type->name }}
        </h1>
        <h2 class="fs-3">
            {{ $type->slug }}
        </h2>
        <h3>
            Linked projects: {{count($type->projects)}}
        </h3>
        <p class="fs-5">
            {{ $type->description }}
        </p>

        <div class="d-flex row justify-content-between">
            <div class="col">
                <a href="{{ route('admin.types.index') }}" class="btn btn-primary w-100">Return to Types</a>
            </div>
            <div class="col">
                <a class="w-100 btn btn-warning" href="{{ route('admin.types.edit', ['type' => $type->slug]) }}">
                    Edit Type
                </a>
            </div>
            <div class="col">
                <form action="{{ route('admin.types.destroy', ['type' => $type->slug]) }}" method="post"
                    class="col delete_form">
                    @csrf
                    @method('DELETE')

                @section('delete-element-name', 'type')
                @include('partials.forms.sweet_delete.delete_btn')
            </form>
        </div>
    </div>

</div>

@include('partials.forms.sweet_delete.delete_alert')
@endsection
