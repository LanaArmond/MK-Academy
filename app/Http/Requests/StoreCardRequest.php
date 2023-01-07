<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCardRequest extends FormRequest
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
        //dd($this);
        return [
            'identifier'=>'string|max:1|required',
            'client_id'=>'integer|required|exists:users,id',
            'personal_id'=>'integer|required|exists:users,id',
            'exercise_id'=>'array|required',
            'exercise_id.*'=>'integer|exists:exercises,id',
        ];
    }
}
