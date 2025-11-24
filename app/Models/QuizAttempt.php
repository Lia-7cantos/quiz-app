<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAttempt extends Model
{
    use HasFactory;

    /**
     * Os atributos que podem ser preenchidos em massa
     */
    protected $fillable = [
        'user_id',
        'quiz_id',
        'score',
        'correct_answers',
        'wrong_answers',
        'time_spent',
        'completed_at'
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos
     */
    protected $casts = [
        'completed_at' => 'datetime',
        'score' => 'integer',
        'correct_answers' => 'integer',
        'wrong_answers' => 'integer',
        'time_spent' => 'integer'
    ];

    /**
     * Uma tentativa pertence a um usuário
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Uma tentativa pertence a um quiz
     */
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    /**
     * Uma tentativa tem muitas respostas do usuário
     */
    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class);
    }
}
