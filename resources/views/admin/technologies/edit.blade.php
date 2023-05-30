@extends('layouts.admin')

@section('page-title', 'Edit Technology')

@section('admin-content')

    <div class="container">

        @include('partials.forms.validation.errors_alert')

        <form method="POST" action=" {{ route('admin.technologies.update', ['technology' => $technology->slug]) }}">

            @csrf

            @method('PUT')

            @include(
                'partials.forms.edit_form_element',
                $data = ['default' => $technology->name, 'type' => 'text', 'field' => 'name', 'label' => 'Name']
            )

            @include(
                'partials.forms.edit_form_element',
                $data = [
                    'default' => $technology->description,
                    'type' => 'textarea',
                    'field' => 'description',
                    'label' => 'Description',
                ]
            )

            <button technology="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
