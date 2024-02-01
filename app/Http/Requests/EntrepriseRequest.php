<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntrepriseRequest extends FormRequest
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
            "name" => "required|string|min:5|max:30",
            "location" => "required|min:10|max:300",
            "contact" => "required|min:10|max:300"
        ];


    }
    function messages()
    {
        return [
            'name.required' => 'vous devez remplir le champ du name',
            'name.min' => 'Le name doit avoir au moins :min caractères.',
            'name.max' => 'Le name ne doit pas dépasser :max caractères.',
            'location.required' => 'vous devez remplir le champ du location',
            'location.min' => 'Le location doit avoir au moins :min caractères.',
            'location.max' => 'Le location ne doit pas dépasser :max caractères.',
            'contact.required' => 'vous devez remplir le champ du contact',
            'contact.min' => 'Le contact doit avoir au moins :min caractères.',
            'contact.max' => 'Le contact ne doit pas dépasser :max caractères.'

        ];
    }

}
