<?php

namespace App\Http\Controllers\Api;

use App\Services\QuotesService;
use App\Http\Controllers\Controller;

class ApiQuotesController extends Controller
{
    protected $quotesService;

    public function __construct(QuotesService $quotesService)
    {
        $this->quotesService = $quotesService;
    }

    public function fetchQuotes()
    {
        return response()->json($this->quotesService->getQuotes());
    }
}
