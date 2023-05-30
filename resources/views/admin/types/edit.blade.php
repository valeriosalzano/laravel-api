@extends('layouts.admin')

@section('page-title', 'Edit Type')

@section('admin-content')

    <div class="container">

        @include('partials.forms.validation.errors_alert')

        <form method="POST" action=" {{ route('admin.types.update', ['type' => $type->slug]) }}">

            @csrf

            @method('PUT')

            @include(
                'partials.forms.edit_form_element',
                $data = ['default' => $type->name, 'type' => 'text', 'field' => 'name', 'label' => 'Name']
            )

            @include(
                'partials.forms.edit_form_element',
                $data = [
                    'default' => $type->description,
                    'type' => 'textarea',
                    'field' => 'description',
                    'label' => 'Description',
                ]
            )

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
