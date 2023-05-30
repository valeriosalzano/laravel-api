@extends('layouts.admin')
@section('page-title','Technologies')

@section('admin-content')

    <div class="container text-end">
        <a href="{{route('admin.technologies.create')}}">
            <button class="btn btn-primary me-3"> Add a Technology </button>
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
            @foreach ($technologies as $technology)
                <tr class="technology-container">
                    <td>{{ $technology->id }}</td>
                    <td class="technology-name">{{ $technology->name }}</td>
                    <td>{{ $technology->slug }}</td>
                    <td>{{count($technology->projects)}}</td>
                    <td>
                        <div class="d-flex justify-content-start align-items-center">

                            <a class="btn btn-primary me-1" href="{{ route('admin.technologies.show', $technology->slug) }}">
                                Show
                            </a>
                            <a class="btn btn-warning me-1"
                                href="{{ route('admin.technologies.edit', ['technology' => $technology->slug]) }}">
                                Edit
                            </a>
                            <form action="{{ route('admin.technologies.destroy', ['technology' => $technology->slug]) }}"
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

@section('delete-element-name', 'technology')
@include('partials.forms.sweet_delete.delete_alert')
@endsection
