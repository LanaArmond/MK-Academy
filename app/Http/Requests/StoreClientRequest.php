<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' =>'required|string',
            'cpf' =>'required|string',
            'password' =>'required|string|min:6|confirmed',
            'phone' => 'required|string',
            'birth_date' => 'required|date',
            'registration_date' => 'required|date',
        ];
    }
}
