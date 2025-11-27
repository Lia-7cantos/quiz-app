<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'Quiz Marvel API',
        'version' => '1.0',
        'status' => 'online'
    ]);
});
