@extends('layouts.admin')
@section('page-title', 'Show Project')
@section('admin-content')

    <div class="container py-3 project-container">

        @include('partials.forms.validation.success_alert')

        <div class="w-100">
            <img src="
            @if (substr($project->cover_image, 0, 5) == 'cover') {{ asset('storage/' . $project->cover_image) }}
            @else {{$project->cover_image}}
            @endif"
                alt=" cover of {{ $project->title }}">
        </div>
        <h1 class="fs-1 border-bottom mb-3 py-2 project-title">
            {{ $project->title }}
        </h1>
        <h3 class="fs-3">
            {{ $project->slug }}
        </h3>
        <h5>
            {{ 'Type: ' }} {{ $project->type ? $project->type->name : 'No types match.' }}
        </h5>
        <h5>
            {{ 'Technology: ' }}
            @forelse ($project->technologies as $technology)
                <span class="badge rounded-pill text-bg-secondary p-1">{{ $technology->name }}</span>
            @empty
                {{ 'NULL' }}
            @endforelse
        </h5>
        <p class="fs-5">
            {{ $project->description }}
        </p>

        <div class="d-flex row justify-content-between">
            <div class="col">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-primary w-100">Return to Projects</a>
            </div>
            <div class="col">
                <a class="w-100 btn btn-warning" href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}">
                    Edit Project
                </a>
            </div>
            <div class="col">
                <form action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}" method="post"
                    class="col delete_form">
                    @csrf
                    @method('DELETE')

                    @section('delete-element-name', 'Project')
                    @include('partials.forms.sweet_delete.delete_btn')
                </form>
            </div>
        </div>

    </div>

    @include('partials.forms.sweet_delete.delete_alert')
@endsection
