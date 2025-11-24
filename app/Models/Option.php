<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    /**
     * Os atributos que podem ser preenchidos em massa
     */
    protected $fillable = [
        'question_id',
        'option_text',
        'is_correct'
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos
     */
    protected $casts = [
        'is_correct' => 'boolean'
    ];

    /**
     * Uma opção pertence a uma pergunta
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
