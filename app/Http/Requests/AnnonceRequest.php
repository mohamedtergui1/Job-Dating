<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnonceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => "required|string|min:5|max:30",
            "description" => "required|min:10|max:300",
            "entreprise_id" => "required",
            'image' => 'nullable|mimes:png,jpeg,jpg,webp'
        ];


    }
    function messages()
    {
        return [
            'title.required' => 'vous devez remplir le champ du title',
            'title.min' => 'Le title doit avoir au moins :min caractères.',
            'title.max' => 'Le title ne doit pas dépasser :max caractères.',
            'description.required' => 'vous devez remplir le champ du description',
            'description.min' => 'Le description doit avoir au moins :min caractères.',
            'description.max' => 'Le description ne doit pas dépasser :max caractères.',
            'entreprise_id.required' => 'vous devez remplir le champ du entreprise',
            'image.mimes' => 'please  put a valid format for image'

        ];
    }
}
