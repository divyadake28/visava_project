<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\Package;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminCrudTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::factory()->create([
            'email' => 'admin@visava.com',
            'is_admin' => true,
        ]);
    }

    public function test_admin_can_create_marathi_only_blog(): void
    {
        Storage::fake('public');

        $response = $this->actingAs($this->admin)->post(route('admin.blogs.store'), [
            'title_mr' => 'फक्त मराठी ब्लॉग शीर्षक',
            'description_mr' => 'फक्त मराठी ब्लॉग मजकूर',
            'status' => 'active',
        ]);

        $response->assertRedirect(route('admin.blogs.index'));

        $this->assertDatabaseHas('blogs', [
            'title_mr' => 'फक्त मराठी ब्लॉग शीर्षक',
            'description_mr' => 'फक्त मराठी ब्लॉग मजकूर',
        ]);
    }

    public function test_admin_can_create_english_only_blog(): void
    {
        $response = $this->actingAs($this->admin)->post(route('admin.blogs.store'), [
            'title_en' => 'English Only Blog Title',
            'description_en' => 'English only blog description content',
            'status' => 'active',
        ]);

        $response->assertRedirect(route('admin.blogs.index'));

        $this->assertDatabaseHas('blogs', [
            'title_en' => 'English Only Blog Title',
            'description_en' => 'English only blog description content',
        ]);
    }

    public function test_blog_validation_fails_when_neither_language_is_provided(): void
    {
        $response = $this->actingAs($this->admin)->post(route('admin.blogs.store'), [
            'status' => 'active',
        ]);

        $response->assertSessionHasErrors(['title_mr', 'title_en', 'description_mr', 'description_en']);
    }

    public function test_admin_can_create_multilingual_package(): void
    {
        $response = $this->actingAs($this->admin)->post(route('admin.packages.store'), [
            'title_mr' => 'नवीन पॅकेज',
            'title_en' => 'New Tour Package',
            'price' => 4999,
            'duration_mr' => '२ दिवस',
            'duration_en' => '2 Days',
            'description_mr' => 'मराठी पॅकेज तपशील',
            'description_en' => 'English package details',
            'status' => 'active',
        ]);

        $response->assertRedirect(route('admin.packages.index'));

        $this->assertDatabaseHas('packages', [
            'title_mr' => 'नवीन पॅकेज',
            'title_en' => 'New Tour Package',
            'price' => 4999,
        ]);
    }
}