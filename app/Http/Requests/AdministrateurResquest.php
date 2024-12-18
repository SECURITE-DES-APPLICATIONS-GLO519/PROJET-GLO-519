<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdministrateurResquest extends FormRequest
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
            'nom'=>'required|string',
            'user_id'=>'nullable|integer',
            'service'=>'required|string',
            'departement_id'=>'nullable|integer',
            'role'=>'required|string',
            'name'=>'required|string',
            'password'=>'required|string',
            'email'=>'required|string'
        ];
    }
}
