<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class QuotesService
{
    public function getQuotes(int $count = 5): array
    {
        $quotes = [];

        for ($i = 0; $i < $count; $i++) {
            $response = Http::get('https://api.kanye.rest');
            if ($response->ok()) {
                $quotes[] = $response->json()['quote'];
            }
        }

        return $quotes;
    }
}
