<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudanteUpdateRequest extends FormRequest
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
            'nome' => 'required|string',
            'genero' => 'required|string',
            'turma' => 'required|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'nome' => 'Nome',
            'genero' => 'Gênero',
            'turma' => 'Turma',
        ];
    }
}
