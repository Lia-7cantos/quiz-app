<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubmitAnswerRequest;
use App\Http\Requests\CompleteQuizRequest;
use App\Models\QuizAttempt;
use App\Models\UserAnswer;
use App\Models\Question;
use App\Models\Option;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuizAttemptController extends Controller
{
    /**
     * enviar resposta para uma questão do quiz
     */
    public function submitAnswer(SubmitAnswerRequest $request): JsonResponse
    {
        DB::beginTransaction();

        try {
            $quizAttempt = QuizAttempt::find($request->quiz_attempt_id);
            $question = Question::find($request->question_id);
            $selectedOption = Option::find($request->option_id);

            // verificar se a opção pertence à questão
            if ($selectedOption->question_id !== $question->id) {
                return response()->json([
                    'message' => 'A opção selecionada não pertence a esta questão.'
                ], 422);
            }

            // verificar se usuário já respondeu esta questão
            $existingAnswer = UserAnswer::where('quiz_attempt_id', $quizAttempt->id)
                ->where('question_id', $question->id)
                ->first();

            if ($existingAnswer) {
                return response()->json([
                    'message' => 'Você já respondeu esta questão.'
                ], 409);
            }

            // verificar se a resposta está correta
            $isCorrect = $selectedOption->is_correct;
            $points = 10; 

            // criar registro da resposta
            $userAnswer = UserAnswer::create([
                'quiz_attempt_id' => $quizAttempt->id,
                'question_id' => $question->id,
                'option_id' => $selectedOption->id,
                'is_correct' => $isCorrect
            ]);

            // atualizar estatísticas da tentativa
            if ($isCorrect) {
                $quizAttempt->increment('correct_answers');
                $quizAttempt->increment('score', $points);
            } else {
                $quizAttempt->increment('wrong_answers');
            }

            DB::commit();

            return response()->json([
                'message' => 'Resposta registrada com sucesso!',
                'is_correct' => $isCorrect,
                'correct_answer_id' => $isCorrect ? null : $question->correctOption->id, // Só revela resposta correta se errou
                'current_score' => $quizAttempt->score,
                'correct_answers' => $quizAttempt->correct_answers,
                'wrong_answers' => $quizAttempt->wrong_answers
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'Erro ao processar resposta.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * finalizar a tentativa de quiz
     */
    public function complete(CompleteQuizRequest $request): JsonResponse
    {
        DB::beginTransaction();

        try {
            $quizAttempt = QuizAttempt::find($request->quiz_attempt_id);

            // vrificar se todas as questões foram respondidas
            $answeredQuestions = UserAnswer::where('quiz_attempt_id', $quizAttempt->id)->count();
            $totalQuestions = 10;

            if ($answeredQuestions < $totalQuestions) {
                return response()->json([
                    'message' => 'Você precisa responder todas as questões antes de finalizar.',
                    'answered' => $answeredQuestions,
                    'total' => $totalQuestions
                ], 422);
            }

            // fnalizar a tentativa
            $quizAttempt->update([
                'completed_at' => now(),
                'time_spent' => $request->time_spent ?? 0
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Quiz finalizado com sucesso!',
                'final_score' => $quizAttempt->score,
                'correct_answers' => $quizAttempt->correct_answers,
                'wrong_answers' => $quizAttempt->wrong_answers,
                'time_spent' => $quizAttempt->time_spent,
                'accuracy' => round(($quizAttempt->correct_answers / $totalQuestions) * 100, 2)
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'Erro ao finalizar quiz.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * bscar resultados de uma tentativa específica
     */
    public function results($attemptId): JsonResponse
    {
        try {
            $quizAttempt = QuizAttempt::with(['userAnswers.question', 'userAnswers.option'])
                ->where('id', $attemptId)
                ->where('user_id', Auth::id())
                ->firstOrFail();

            // verificar se o quiz foi finalizado
            if (!$quizAttempt->completed_at) {
                return response()->json([
                    'message' => 'Este quiz ainda não foi finalizado.'
                ], 422);
            }

            return response()->json([
                'attempt' => $quizAttempt,
                'results' => [
                    'final_score' => $quizAttempt->score,
                    'correct_answers' => $quizAttempt->correct_answers,
                    'wrong_answers' => $quizAttempt->wrong_answers,
                    'time_spent' => $quizAttempt->time_spent,
                    'accuracy' => round(($quizAttempt->correct_answers / 10) * 100, 2),
                    'completed_at' => $quizAttempt->completed_at
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Tentativa não encontrada.',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * buscar todas as tentativas do usuário
     */
    public function userAttempts(): JsonResponse
    {
        try {
            $attempts = QuizAttempt::with('quiz')
                ->where('user_id', Auth::id())
                ->whereNotNull('completed_at')
                ->orderBy('created_at', 'desc')
                ->get()
                ->makeHidden(['user_id', 'quiz_id']);

            return response()->json([
                'attempts' => $attempts
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao carregar tentativas.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
