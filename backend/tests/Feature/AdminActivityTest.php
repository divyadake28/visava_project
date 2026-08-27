<?php

namespace Tests\Feature;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminActivityTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;
    protected User $regularUser;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::factory()->create([
            'email' => 'admin@visava.com',
            'is_admin' => true,
        ]);

        $this->regularUser = User::factory()->create([
            'is_admin' => false,
        ]);
    }

    public function test_guests_and_regular_users_cannot_access_activities_management(): void
    {
        $this->get(route('admin.activities.index'))->assertRedirect(route('login'));

        $this->actingAs($this->regularUser)
            ->get(route('admin.activities.index'))
            ->assertForbidden();
    }

    public function test_admin_can_view_activities_index(): void
    {
        Activity::create([
            'title_mr' => 'वॉटर पार्क',
            'title_en' => 'Water Park',
            'is_active' => true,
            'sort_order' => 1,
        ]);

        $response = $this->actingAs($this->admin)->get(route('admin.activities.index'));

        $response->assertOk()
            ->assertSee('Water Park')
            ->assertSee('वॉटर पार्क');
    }

    public function test_admin_can_create_marathi_only_activity(): void
    {
        $response = $this->actingAs($this->admin)->post(route('admin.activities.store'), [
            'title_mr' => 'फक्त मराठी उपक्रम',
            'short_description_mr' => 'संक्षिप्त मराठी माहिती',
            'description_mr' => 'सविस्तर मराठी माहिती',
            'icon' => '🌊',
            'sort_order' => 2,
            'is_active' => '1',
        ]);

        $response->assertRedirect(route('admin.activities.index'));

        $this->assertDatabaseHas('activities', [
            'title_mr' => 'फक्त मराठी उपक्रम',
            'icon' => '🌊',
            'sort_order' => 2,
            'is_active' => true,
        ]);
    }

    public function test_admin_can_create_english_only_activity(): void
    {
        $response = $this->actingAs($this->admin)->post(route('admin.activities.store'), [
            'title_en' => 'English Only Activity',
            'short_description_en' => 'Short English details',
            'description_en' => 'Detailed English description',
            'icon' => '🎢',
            'sort_order' => 3,
            'is_active' => '1',
        ]);

        $response->assertRedirect(route('admin.activities.index'));

        $this->assertDatabaseHas('activities', [
            'title_en' => 'English Only Activity',
            'icon' => '🎢',
            'sort_order' => 3,
        ]);
    }

    public function test_validation_fails_when_both_titles_are_missing(): void
    {
        $response = $this->actingAs($this->admin)->post(route('admin.activities.store'), [
            'icon' => '🌊',
            'sort_order' => 1,
        ]);

        $response->assertSessionHasErrors(['title_mr', 'title_en']);
    }

    public function test_admin_can_upload_image_for_activity(): void
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('activity.jpg', 600, 400);

        $response = $this->actingAs($this->admin)->post(route('admin.activities.store'), [
            'title_mr' => 'फोटो सह उपक्रम',
            'title_en' => 'Activity with Photo',
            'image' => $file,
            'is_active' => '1',
        ]);

        $response->assertRedirect(route('admin.activities.index'));

        $activity = Activity::first();
        $this->assertNotNull($activity->image);
        Storage::disk('public')->assertExists($activity->image);
    }

    public function test_admin_can_update_activity(): void
    {
        $activity = Activity::create([
            'title_mr' => 'मूळ नाव',
            'title_en' => 'Original Title',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->admin)->put(route('admin.activities.update', $activity), [
            'title_mr' => 'सुधारित नाव',
            'title_en' => 'Updated Title',
            'sort_order' => 5,
            'is_active' => '0',
        ]);

        $response->assertRedirect(route('admin.activities.index'));

        $activity->refresh();
        $this->assertEquals('सुधारित नाव', $activity->title_mr);
        $this->assertEquals('Updated Title', $activity->title_en);
        $this->assertEquals(5, $activity->sort_order);
        $this->assertFalse($activity->is_active);
    }

    public function test_admin_can_delete_activity(): void
    {
        $activity = Activity::create([
            'title_en' => 'To be deleted',
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->admin)->delete(route('admin.activities.destroy', $activity));

        $response->assertRedirect(route('admin.activities.index'));

        $this->assertSoftDeleted('activities', [
            'id' => $activity->id,
        ]);
    }
}