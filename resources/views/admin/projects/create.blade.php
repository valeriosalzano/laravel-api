@extends('layouts.admin')

@section('page-title', 'New Project')

@section('admin-content')
    <div class="container">

        @include('partials.forms.validation.errors_alert')

        <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">

            @csrf

            @include(
                'partials.forms.create_form_element',
                $data = ['type' => 'text', 'field' => 'title', 'label' => 'Project title']
            )

            @include(
                'partials.forms.create_form_element',
                $data = ['type' => 'file', 'field' => 'cover_image', 'label' => 'Project image file']
            )

            @include(
                'partials.forms.create_form_element',
                $data = ['type' => 'textarea', 'field' => 'description', 'label' => 'Project Description']
            )

            @include(
                'partials.forms.create_form_element',
                $data = ['type' => 'select', 'field' => 'type_id', 'label' => 'Project Type', 'options' => $types]
            )

            @include(
                'partials.forms.create_form_element',
                $data = [
                    'type' => 'checkboxes',
                    'field' => 'technologies',
                    'options' => $technologies,
                    'label' => 'Project Technologies:',
                ]
            )

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
