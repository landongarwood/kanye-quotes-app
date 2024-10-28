<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Laravel\Sanctum\Sanctum;

class QuotesApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test accessing quotes API without authentication.
     *
     * @return void
     */
    public function test_accessing_quotes_api_without_authentication_fails()
    {
        $response = $this->getJson('/api/quotes');

        $response->assertStatus(401);
    }

    /**
     * Test accessing quotes API with valid authentication.
     *
     * @return void
     */
    public function test_accessing_quotes_api_with_authentication_succeeds()
    {
        $user = User::factory()->create();

        Sanctum::actingAs($user);

        $response = $this->getJson('/api/quotes');

        $response->assertStatus(200);

        $response->assertJsonCount(5);

        foreach ($response->json() as $quote) {
            $this->assertIsString($quote);
        }
    }
}
