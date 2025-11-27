<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SubmitAnswerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'quiz_attempt_id' => [
                'required',
                'integer',
                Rule::exists('quiz_attempts', 'id')->where('user_id', Auth::id())
            ],
            'question_id' => [
                'required',
                'integer',
                Rule::exists('questions', 'id')
            ],
            'option_id' => [
                'required',
                'integer',
                Rule::exists('options', 'id')
            ]
        ];
    }

    /**
     * Mensagens de erro personalizadas
     */
    public function messages(): array
    {
        return [
            'quiz_attempt_id.required' => 'O ID da tentativa é obrigatório.',
            'quiz_attempt_id.integer' => 'O ID da tentativa deve ser um número inteiro.',
            'quiz_attempt_id.exists' => 'Tentativa não encontrada ou não pertence a você.',

            'question_id.required' => 'O ID da pergunta é obrigatório.',
            'question_id.integer' => 'O ID da pergunta deve ser um número inteiro.',
            'question_id.exists' => 'A pergunta selecionada não existe.',

            'option_id.required' => 'O ID da opção é obrigatório.',
            'option_id.integer' => 'O ID da opção deve ser um número inteiro.',
            'option_id.exists' => 'A opção selecionada não existe.'
        ];
    }
}
