<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            if (!Schema::hasColumn('blogs', 'blog_video')) {
                $table->string('blog_video')->nullable()->after('featured_image');
            }
            if (!Schema::hasColumn('blogs', 'youtube_url')) {
                $table->string('youtube_url', 500)->nullable()->after('blog_video');
            }
            if (!Schema::hasColumn('blogs', 'instagram_url')) {
                $table->string('instagram_url', 500)->nullable()->after('youtube_url');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['blog_video', 'youtube_url', 'instagram_url']);
        });
    }
};
