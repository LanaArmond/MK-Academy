<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
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
            'email' =>'required|string|unique:users,email',
            'password' =>'required|string|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Email já está sendo utilizado',
            'password.required' => 'A senha é obrigatória',
            'password.min' => 'A senha deve conter no mínimo 6 caracteres',
            'password.confirmed' => 'Confirmação de senha está incorreta'
        ];
    }
}
