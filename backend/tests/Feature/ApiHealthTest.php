<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiHealthTest extends TestCase
{
    /**
     * Test API health check endpoint returns 200 and expected payload.
     */
    public function test_api_health_endpoint(): void
    {
        $response = $this->getJson('/api/health');

        $response->assertStatus(200)
            ->assertJson([
                'status' => 'ok',
                'app' => 'Visava',
            ]);
    }

    /**
     * Test CORS headers for Angular frontend origin.
     */
    public function test_cors_headers_for_angular(): void
    {
        $response = $this->withHeaders([
            'Origin' => 'http://localhost:4200',
            'Access-Control-Request-Method' => 'GET',
        ])->optionsJson('/api/health');

        $response->assertStatus(204)
            ->assertHeader('Access-Control-Allow-Origin', 'http://localhost:4200');
    }
}
