<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class Quotes extends Component
{
    public $quotes = [];

    public function fetchQuotes()
    {
        if (Auth::check()) {
            $token = Auth::user()->createToken('LivewireQuotesToken')->plainTextToken;

            $response = Http::withToken($token)->get(config('app.api_host') . '/api/quotes');

            if ($response->ok()) {
                $this->quotes = $response->json();
            } else {
                $this->quotes = [];
            }
        } else {
            $this->quotes = [];
        }
    }

    public function render()
    {
        return view('livewire.quotes');
    }
}
