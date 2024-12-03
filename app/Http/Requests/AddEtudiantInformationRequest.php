<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddEtudiantInformationRequest extends FormRequest
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
            'matricule'=>'required|string',
            'nom'=>'required|string',
            'prenom'=>'nullable|string',
            'niveau'=>'required|string',
            'cycle'=>'required|string',
            'user_id'=>'required|integer',
        ];
    }
}
