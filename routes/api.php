<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\QuizController;
use App\Http\Controllers\Api\QuizAttemptController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Rotas PÚBLICAS
Route::get('/ranking', [QuizController::class, 'ranking']);

// Autenticação
Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $token = $user->createToken('quiz-token')->plainTextToken;
        return response()->json([
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email
            ]
        ]);
    }

    return response()->json(['error' => 'Credenciais inválidas'], 401);
});

Route::post('/register', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|confirmed'
    ]);

    $user = \App\Models\User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password'])
    ]);

    $token = $user->createToken('quiz-token')->plainTextToken;

    return response()->json([
        'token' => $token,
        'user' => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email
        ]
    ], 201);
});

// Rotas PROTEGIDAS
Route::middleware(['auth:sanctum'])->group(function () {
    // Quiz Routes
    Route::post('/quiz/start', [QuizController::class, 'start']);
    Route::get('/quiz/questions', [QuizController::class, 'questions']);

    // Quiz Attempt Routes  
    Route::post('/quiz/answer', [QuizAttemptController::class, 'submitAnswer']);
    Route::post('/quiz/complete', [QuizAttemptController::class, 'complete']);
    Route::get('/quiz/attempts', [QuizAttemptController::class, 'userAttempts']);
    Route::get('/quiz/results/{attemptId}', [QuizAttemptController::class, 'results']);

    // Logout
    Route::post('/logout', function (Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logout realizado']);
    });
});
