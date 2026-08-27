<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\Package;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MultilingualApiTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Package::create([
            'title_mr' => 'पॅकेज १',
            'title_en' => 'Package 1',
            'slug' => 'package-1',
            'price' => 1999,
            'duration_mr' => '१ दिवस',
            'duration_en' => '1 Day',
            'description_mr' => 'मराठी तपशील',
            'description_en' => 'English Details',
            'status' => 'active',
        ]);

        // Blog with only Marathi content to test fallback
        Blog::create([
            'title_mr' => 'मराठी विशेष ब्लॉग',
            'slug' => 'marathi-special-blog',
            'description_mr' => 'मराठी मजकूर',
            'status' => 'active',
        ]);

        // Blog with only English content to test fallback
        Blog::create([
            'title_en' => 'English Exclusive Blog',
            'slug' => 'english-exclusive-blog',
            'description_en' => 'English Content only',
            'status' => 'active',
        ]);
    }

    public function test_api_v1_packages_defaults_to_marathi(): void
    {
        $response = $this->getJson('/api/v1/packages');

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'language' => 'mr',
            ])
            ->assertJsonFragment([
                'title' => 'पॅकेज १',
            ]);
    }

    public function test_api_v1_packages_supports_english(): void
    {
        $response = $this->getJson('/api/v1/packages?lang=en');

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'language' => 'en',
            ])
            ->assertJsonFragment([
                'title' => 'Package 1',
            ]);
    }

    public function test_api_v1_fallback_to_marathi_when_english_empty(): void
    {
        $response = $this->getJson('/api/v1/blogs/marathi-special-blog?lang=en');

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'title' => 'मराठी विशेष ब्लॉग',
                ],
            ]);
    }

    public function test_api_v1_fallback_to_english_when_marathi_empty(): void
    {
        $response = $this->getJson('/api/v1/blogs/english-exclusive-blog?lang=mr');

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'title' => 'English Exclusive Blog',
                ],
            ]);
    }

    public function test_api_v1_enquiry_submission(): void
    {
        $response = $this->postJson('/api/v1/enquiries', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '9876543210',
            'subject' => 'Booking Inquiry',
            'message' => 'Interested in weekend booking.',
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'success' => true,
                'language' => 'mr',
            ]);

        $this->assertDatabaseHas('enquiries', [
            'email' => 'john@example.com',
        ]);
    }
}