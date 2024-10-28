<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiQuotesController;

Route::middleware('auth:sanctum')->get('/quotes', [ApiQuotesController::class, 'fetchQuotes'])->name('api.quotes');
