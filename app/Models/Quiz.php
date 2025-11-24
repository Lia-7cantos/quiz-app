<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    /**
     * Os atributos que podem ser preenchidos em massa
     */
    protected $fillable = [
        'title',
        'description',
        'total_questions'
    ];

    /**
     * Um quiz tem muitas perguntas
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Um quiz tem muitas tentativas
     */
    public function attempts()
    {
        return $this->hasMany(QuizAttempt::class);
    }
}
