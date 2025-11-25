<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rota testar  banco
Route::get('/test-db', function () {
    try {
        $questionsCount = \App\Models\Question::count();
        $optionsCount = \App\Models\Option::count();
        $quiz = \App\Models\Quiz::first();

        return [
            'questions' => $questionsCount,
            'options' => $optionsCount,
            'quiz' => $quiz
        ];
    } catch (\Exception $e) {
        return ['error' => $e->getMessage()];
    }
});

require __DIR__.'/auth.php';
