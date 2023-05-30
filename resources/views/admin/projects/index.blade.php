@extends('layouts.admin')
@section('page-title','Projects')

@section('admin-content')

    <div class="container text-end">
        <a href="{{route('admin.projects.create')}}">
            <button class="btn btn-primary me-3"> Add a project </button>
        </a>
        
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Type</th>
                <th scope="col">Technologies</th>
                <th scope="col">Slug</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr class="project-container">
                    <td>{{ $project->id }}</td>
                    <td class="project-title">{{ $project->title }}</td>
                    <td>{{ $project->type ? $project->type->name : 'NULL'}}</td>
                    <td>
                        
                        @forelse ($project->technologies as $technology)
                        <span class="badge rounded-pill text-bg-secondary p-1">{{$technology->name}}</span>
                        @empty
                        {{'NULL'}}
                        @endforelse
                    </td>
                    <td>{{ $project->slug }}</td>
                    <td>
                        <div class="d-flex justify-content-between align-items-center">

                            <a class="btn btn-primary me-1" href="{{ route('admin.projects.show', $project->slug) }}">
                                Show
                            </a>
                            <a class="btn btn-warning me-1"
                                href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}">
                                Edit
                            </a>
                            <form action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}"
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

@section('delete-element-name', 'project')
@include('partials.forms.sweet_delete.delete_alert')
@endsection
