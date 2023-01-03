<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'email' =>'required|string|unique:users,email,'. $this->user()->id,
            'cpf' =>'required|string',
            'password' =>'nullable|string|min:6|confirmed',
            'confirm_password' =>'nullable|string|min:6',
            'number' => 'required|string',
            'birth_date' => 'required|date',
            'registration_date' => 'required|date',
        ];
    }
}
