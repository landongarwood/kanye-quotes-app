<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuotesController;

Auth::routes();

Route::get('/', [QuotesController::class, 'show'])->middleware('auth')->name('quotes.show');
