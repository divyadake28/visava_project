<?php

namespace Tests\Feature;

use App\Models\Activity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiActivityTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Activity::create([
            'title_mr' => 'वॉटर पार्क व राइड्स',
            'title_en' => 'Water Park & Rides',
            'short_description_mr' => 'मराठी संक्षिप्त',
            'short_description_en' => 'English summary',
            'icon' => '🌊',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        Activity::create([
            'title_mr' => 'केवळ मराठी उपक्रम',
            'title_en' => null,
            'short_description_mr' => 'फक्त मराठी',
            'short_description_en' => null,
            'icon' => '🎭',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        Activity::create([
            'title_mr' => null,
            'title_en' => 'English Exclusive Activity',
            'short_description_mr' => null,
            'short_description_en' => 'English only details',
            'icon' => '🎪',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        Activity::create([
            'title_en' => 'Inactive Activity',
            'sort_order' => 4,
            'is_active' => false,
        ]);
    }

    public function test_api_v1_activities_returns_only_active_ordered_by_sort_order(): void
    {
        $response = $this->getJson('/api/v1/activities');

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'language' => 'mr',
            ]);

        $data = $response->json('data');
        $this->assertCount(3, $data);
        $this->assertEquals('वॉटर पार्क व राइड्स', $data[0]['title']);
        $this->assertEquals(1, $data[0]['sort_order']);
    }

    public function test_api_v1_activities_supports_english_lang_query(): void
    {
        $response = $this->getJson('/api/v1/activities?lang=en');

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'language' => 'en',
            ]);

        $data = $response->json('data');
        $this->assertEquals('Water Park & Rides', $data[0]['title']);
        $this->assertEquals('English summary', $data[0]['short_description']);
    }

    public function test_api_v1_activities_fallback_to_marathi_when_english_empty(): void
    {
        $response = $this->getJson('/api/v1/activities?lang=en');

        $response->assertStatus(200);
        $data = $response->json('data');

        // Item 2 has only Marathi
        $this->assertEquals('केवळ मराठी उपक्रम', $data[1]['title']);
    }

    public function test_api_v1_activities_fallback_to_english_when_marathi_empty(): void
    {
        $response = $this->getJson('/api/v1/activities?lang=mr');

        $response->assertStatus(200);
        $data = $response->json('data');

        // Item 3 has only English
        $this->assertEquals('English Exclusive Activity', $data[2]['title']);
    }

    public function test_api_v1_single_activity_by_id(): void
    {
        $activity = Activity::where('is_active', true)->first();

        $response = $this->getJson("/api/v1/activities/{$activity->id}?lang=en");

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'id' => $activity->id,
                    'title' => 'Water Park & Rides',
                ],
            ]);
    }

    public function test_api_v1_activity_not_found_returns_404(): void
    {
        $response = $this->getJson('/api/v1/activities/99999');

        $response->assertStatus(404)
            ->assertJson([
                'success' => false,
                'data' => null,
            ]);
    }
}