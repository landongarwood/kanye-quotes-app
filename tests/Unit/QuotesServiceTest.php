<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\QuotesService;
use Illuminate\Support\Facades\Http;

class QuotesServiceTest extends TestCase
{
    /**
     * Test that QuotesService fetches multiple quotes correctly.
     */
    public function test_it_fetches_multiple_quotes_successfully()
    {
        // Mock multiple responses for each API call
        Http::fake([
            'https://api.kanye.rest' => Http::sequence()
                ->push(['quote' => "Man... whatever happened to my antique fish tank?"], 200)
                ->push(['quote' => "I love sleep; it's my favorite."], 200)
                ->push(['quote' => "I'm the best"], 200)
                ->push(['quote' => "One of my favorite things..."], 200)
                ->push(['quote' => "I'd like to meet with Tim Cook. I got some ideas"], 200),
        ]);

        $quotesService = new QuotesService();
        $quotes = $quotesService->getQuotes(5); // Request 5 quotes

        // Assert the response structure and content
        $this->assertIsArray($quotes);
        $this->assertCount(5, $quotes);
        $this->assertEquals("Man... whatever happened to my antique fish tank?", $quotes[0]);
        $this->assertEquals("I love sleep; it's my favorite.", $quotes[1]);
        $this->assertEquals("I'm the best", $quotes[2]);
        $this->assertEquals("One of my favorite things...", $quotes[3]);
        $this->assertEquals("I'd like to meet with Tim Cook. I got some ideas", $quotes[4]);
    }

    /**
     * Test that QuotesService handles API failure gracefully.
     */
    public function test_it_handles_api_failure_gracefully()
    {
        // Mock a failed response for each API call
        Http::fake([
            'https://api.kanye.rest' => Http::sequence()
                ->push(null, 500) // Simulate failure for each call
                ->push(null, 500)
                ->push(null, 500)
                ->push(null, 500)
                ->push(null, 500),
        ]);

        $quotesService = new QuotesService();
        $quotes = $quotesService->getQuotes(5); // Request 5 quotes

        // Assert that quotes is an empty array when all API calls fail
        $this->assertIsArray($quotes);
        $this->assertEmpty($quotes);
    }
}
