<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    /**
     * Os atributos que podem ser preenchidos em massa
     */
    protected $fillable = [
        'quiz_id',
        'question_text'
    ];

    /**
     * Uma pergunta pertence a um quiz
     */
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    /**
     * Uma pergunta tem muitas opções de resposta
     */
    public function options()
    {
        return $this->hasMany(Option::class);
    }

    /**
     * Uma pergunta tem uma opção correta
     * (relacionamento para acessar diretamente a opção correta)
     */
    public function correctOption()
    {
        return $this->hasOne(Option::class)->where('is_correct', true);
    }
}
