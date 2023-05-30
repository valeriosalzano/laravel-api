@extends('layouts.admin')

@section('page-title', 'New Type')

@section('admin-content')
    <div class="container">

        @include('partials.forms.validation.errors_alert')

        <form method="POST" action="{{ route('admin.types.store') }}">

            @csrf

            @include(
                'partials.forms.create_form_element',
                $data = ['type' => 'text', 'field' => 'name', 'label' => 'Type name']
            )

            @include(
                'partials.forms.create_form_element',
                $data = ['type' => 'textarea', 'field' => 'description', 'label' => 'Description']
            )

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection