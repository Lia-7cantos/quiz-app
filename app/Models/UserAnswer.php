<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;

    /**
     * Os atributos que podem ser preenchidos em massa
     */
    protected $fillable = [
        'quiz_attempt_id',
        'question_id',
        'option_id',
        'is_correct'
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos
     */
    protected $casts = [
        'is_correct' => 'boolean'
    ];

    /**
     * Uma resposta pertence a uma tentativa de quiz
     */
    public function attempt()
    {
        return $this->belongsTo(QuizAttempt::class, 'quiz_attempt_id');
    }

    /**
     * Uma resposta pertence a uma pergunta
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Uma resposta pertence a uma opção (a opção escolhida pelo usuário)
     */
    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
