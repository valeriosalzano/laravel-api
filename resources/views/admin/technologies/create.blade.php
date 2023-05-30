@extends('layouts.admin')

@section('page-title', 'New Technology')

@section('admin-content')
    <div class="container">

        @include('partials.forms.validation.errors_alert')

        <form method="POST" action="{{ route('admin.technologies.store') }}">

            @csrf

            @include(
                'partials.forms.create_form_element',
                $data = ['type' => 'text', 'field' => 'name', 'label' => 'technology name']
            )

            @include(
                'partials.forms.create_form_element',
                $data = ['type' => 'textarea', 'field' => 'description', 'label' => 'Description']
            )

            <button technology="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection