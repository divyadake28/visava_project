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
        // 1. Upgrade blogs table
        Schema::table('blogs', function (Blueprint $table) {
            if (!Schema::hasColumn('blogs', 'title_mr')) {
                $table->string('title_mr')->nullable()->after('id');
            }
            if (!Schema::hasColumn('blogs', 'title_en')) {
                $table->string('title_en')->nullable()->after('title_mr');
            }
            if (!Schema::hasColumn('blogs', 'short_description_mr')) {
                $table->text('short_description_mr')->nullable()->after('slug');
            }
            if (!Schema::hasColumn('blogs', 'short_description_en')) {
                $table->text('short_description_en')->nullable()->after('short_description_mr');
            }
            if (!Schema::hasColumn('blogs', 'description_mr')) {
                $table->longText('description_mr')->nullable()->after('short_description_en');
            }
            if (!Schema::hasColumn('blogs', 'description_en')) {
                $table->longText('description_en')->nullable()->after('description_mr');
            }
            if (!Schema::hasColumn('blogs', 'status')) {
                $table->string('status')->default('active')->after('featured_image');
            }
            if (!Schema::hasColumn('blogs', 'created_by')) {
                $table->foreignId('created_by')->nullable()->after('status')->constrained('users')->nullOnDelete();
            }
            if (!Schema::hasColumn('blogs', 'updated_by')) {
                $table->foreignId('updated_by')->nullable()->after('created_by')->constrained('users')->nullOnDelete();
            }
            if (!Schema::hasColumn('blogs', 'deleted_at')) {
                $table->softDeletes();
            }
        });

        // 2. Upgrade events table
        Schema::table('events', function (Blueprint $table) {
            if (!Schema::hasColumn('events', 'title_mr')) {
                $table->string('title_mr')->nullable()->after('id');
            }
            if (!Schema::hasColumn('events', 'title_en')) {
                $table->string('title_en')->nullable()->after('title_mr');
            }
            if (!Schema::hasColumn('events', 'location_mr')) {
                $table->string('location_mr')->nullable()->after('slug');
            }
            if (!Schema::hasColumn('events', 'location_en')) {
                $table->string('location_en')->nullable()->after('location_mr');
            }
            if (!Schema::hasColumn('events', 'event_date')) {
                $table->dateTime('event_date')->nullable()->after('location_en');
            }
            if (!Schema::hasColumn('events', 'short_description_mr')) {
                $table->text('short_description_mr')->nullable()->after('event_date');
            }
            if (!Schema::hasColumn('events', 'short_description_en')) {
                $table->text('short_description_en')->nullable()->after('short_description_mr');
            }
            if (!Schema::hasColumn('events', 'description_mr')) {
                $table->longText('description_mr')->nullable()->after('short_description_en');
            }
            if (!Schema::hasColumn('events', 'description_en')) {
                $table->longText('description_en')->nullable()->after('description_mr');
            }
            if (!Schema::hasColumn('events', 'image')) {
                $table->string('image')->nullable()->after('description_en');
            }
            if (!Schema::hasColumn('events', 'status')) {
                $table->string('status')->default('active')->after('image');
            }
            if (!Schema::hasColumn('events', 'created_by')) {
                $table->foreignId('created_by')->nullable()->after('status')->constrained('users')->nullOnDelete();
            }
            if (!Schema::hasColumn('events', 'updated_by')) {
                $table->foreignId('updated_by')->nullable()->after('created_by')->constrained('users')->nullOnDelete();
            }
            if (!Schema::hasColumn('events', 'deleted_at')) {
                $table->softDeletes();
            }
        });

        // 3. Upgrade packages table
        Schema::table('packages', function (Blueprint $table) {
            if (!Schema::hasColumn('packages', 'title_mr')) {
                $table->string('title_mr')->nullable()->after('id');
            }
            if (!Schema::hasColumn('packages', 'title_en')) {
                $table->string('title_en')->nullable()->after('title_mr');
            }
            if (!Schema::hasColumn('packages', 'duration_mr')) {
                $table->string('duration_mr')->nullable()->after('slug');
            }
            if (!Schema::hasColumn('packages', 'duration_en')) {
                $table->string('duration_en')->nullable()->after('duration_mr');
            }
            if (!Schema::hasColumn('packages', 'short_description_mr')) {
                $table->text('short_description_mr')->nullable()->after('price');
            }
            if (!Schema::hasColumn('packages', 'short_description_en')) {
                $table->text('short_description_en')->nullable()->after('short_description_mr');
            }
            if (!Schema::hasColumn('packages', 'description_mr')) {
                $table->longText('description_mr')->nullable()->after('short_description_en');
            }
            if (!Schema::hasColumn('packages', 'description_en')) {
                $table->longText('description_en')->nullable()->after('description_mr');
            }
            if (!Schema::hasColumn('packages', 'status')) {
                $table->string('status')->default('active')->after('featured_image');
            }
            if (!Schema::hasColumn('packages', 'created_by')) {
                $table->foreignId('created_by')->nullable()->after('status')->constrained('users')->nullOnDelete();
            }
            if (!Schema::hasColumn('packages', 'updated_by')) {
                $table->foreignId('updated_by')->nullable()->after('created_by')->constrained('users')->nullOnDelete();
            }
            if (!Schema::hasColumn('packages', 'deleted_at')) {
                $table->softDeletes();
            }
        });

        // 4. Upgrade galleries table
        Schema::table('galleries', function (Blueprint $table) {
            if (!Schema::hasColumn('galleries', 'title_mr')) {
                $table->string('title_mr')->nullable()->after('id');
            }
            if (!Schema::hasColumn('galleries', 'title_en')) {
                $table->string('title_en')->nullable()->after('title_mr');
            }
            if (!Schema::hasColumn('galleries', 'image')) {
                $table->string('image')->nullable()->after('title_en');
            }
            if (!Schema::hasColumn('galleries', 'category_mr')) {
                $table->string('category_mr')->nullable()->after('image');
            }
            if (!Schema::hasColumn('galleries', 'category_en')) {
                $table->string('category_en')->nullable()->after('category_mr');
            }
            if (!Schema::hasColumn('galleries', 'status')) {
                $table->string('status')->default('active')->after('category_en');
            }
            if (!Schema::hasColumn('galleries', 'created_by')) {
                $table->foreignId('created_by')->nullable()->after('status')->constrained('users')->nullOnDelete();
            }
            if (!Schema::hasColumn('galleries', 'updated_by')) {
                $table->foreignId('updated_by')->nullable()->after('created_by')->constrained('users')->nullOnDelete();
            }
            if (!Schema::hasColumn('galleries', 'deleted_at')) {
                $table->softDeletes();
            }
        });

        // 5. Upgrade testimonials table
        Schema::table('testimonials', function (Blueprint $table) {
            if (!Schema::hasColumn('testimonials', 'client_name')) {
                $table->string('client_name')->nullable()->after('id');
            }
            if (!Schema::hasColumn('testimonials', 'client_designation_mr')) {
                $table->string('client_designation_mr')->nullable()->after('client_name');
            }
            if (!Schema::hasColumn('testimonials', 'client_designation_en')) {
                $table->string('client_designation_en')->nullable()->after('client_designation_mr');
            }
            if (!Schema::hasColumn('testimonials', 'review_mr')) {
                $table->text('review_mr')->nullable()->after('client_designation_en');
            }
            if (!Schema::hasColumn('testimonials', 'review_en')) {
                $table->text('review_en')->nullable()->after('review_mr');
            }
            if (!Schema::hasColumn('testimonials', 'client_image')) {
                $table->string('client_image')->nullable()->after('review_en');
            }
            if (!Schema::hasColumn('testimonials', 'status')) {
                $table->string('status')->default('active')->after('rating');
            }
            if (!Schema::hasColumn('testimonials', 'deleted_at')) {
                $table->softDeletes();
            }
        });

        // 6. Upgrade enquiries table
        Schema::table('enquiries', function (Blueprint $table) {
            if (!Schema::hasColumn('enquiries', 'deleted_at')) {
                $table->softDeletes();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Safe down migration
    }
};
