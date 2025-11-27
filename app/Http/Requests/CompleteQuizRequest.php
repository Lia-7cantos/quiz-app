<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CompleteQuizRequest extends FormRequest
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
                Rule::exists('quiz_attempts', 'id')
                    ->where('user_id', Auth::id())
                    ->whereNull('completed_at') // só pode finalizar tentativas não finalizadas
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
            'quiz_attempt_id.exists' => 'Tentativa não encontrada, não pertence a você ou já foi finalizada.'
        ];
    }

    /**
     * Preparar dados para validação
     */
    protected function prepareForValidation()
    {
        // Garantir que time_spent seja um inteiro
        if ($this->has('time_spent')) {
            $this->merge([
                'time_spent' => (int) $this->time_spent
            ]);
        }
    }
}
