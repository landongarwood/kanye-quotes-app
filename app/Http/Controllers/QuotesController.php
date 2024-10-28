<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class QuotesController extends Controller
{
    public function show()
    {
        return view('quotes.index');
    }
}
