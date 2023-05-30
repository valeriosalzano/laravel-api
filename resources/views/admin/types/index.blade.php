@extends('layouts.admin')
@section('page-title','Types')

@section('admin-content')

    <div class="container text-end">
        <a href="{{route('admin.types.create')}}">
            <button class="btn btn-primary me-3"> Add a type </button>
        </a>
        
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Linked Projects</th>
                <th scope="col" class="w-25">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
                <tr class="type-container">
                    <td>{{ $type->id }}</td>
                    <td class="type-name">{{ $type->name }}</td>
                    <td>{{ $type->slug }}</td>
                    <td>{{count($type->projects)}}</td>
                    <td>
                        <div class="d-flex justify-content-start align-items-center">

                            <a class="btn btn-primary me-1" href="{{ route('admin.types.show', $type->slug) }}">
                                Show
                            </a>
                            <a class="btn btn-warning me-1"
                                href="{{ route('admin.types.edit', ['type' => $type->slug]) }}">
                                Edit
                            </a>
                            <form action="{{ route('admin.types.destroy', ['type' => $type->slug]) }}"
                                method="post" class="position">
                                @csrf
                                @method('DELETE')
                                @include('partials.forms.sweet_delete.delete_btn')

                            </form>
                        </div>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@section('delete-element-name', 'type')
@include('partials.forms.sweet_delete.delete_alert')
@endsection
