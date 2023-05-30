<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->title),
        ]);
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'type_id' => 'nullable|exists:types,id',
            'title' => 'required|max:150|unique:projects',
            'description' => 'nullable',
            'cover_image' => 'nullable|image|max:1024',
            'slug' => 'unique:projects,slug',
            'technologies' => 'exists:technologies,id'
        ];
    }
}
