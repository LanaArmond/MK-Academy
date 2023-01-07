<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExerciseRequest extends FormRequest
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
            'description' =>'required|string',
            'seriesNumber' =>'required|integer',
            'repetitionNumber' =>'required|integer',
            'tutorialVideo' =>'required|url',
            'equipment_id' =>'required|integer|exists:equipments,id',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'nome',
            'description' => 'descrição',
            'seriesNumber' => 'Número de Séries',
            'repetitionNumber' => 'Número de Repetições',
            'tutorialVideo' => 'Vídeo Tutorial',
            'equipment_id' => 'Equipamento'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'string' => 'O campo :attribute deve ser do tipo texto',
            'integer' => 'O campo :attribute deve ser um número inteiro',
            'url' => 'O campo :attribute deve ser um URL',
            'exists' => 'O campo :attribute deve estar na tabela de Equipamentos'
        ];
    }   
}
