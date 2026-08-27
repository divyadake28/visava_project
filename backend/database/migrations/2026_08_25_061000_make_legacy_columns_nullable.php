<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            if (Schema::hasColumn('blogs', 'title')) {
                $table->string('title')->nullable()->change();
            }
            if (Schema::hasColumn('blogs', 'content')) {
                $table->longText('content')->nullable()->change();
            }
        });

        Schema::table('events', function (Blueprint $table) {
            if (Schema::hasColumn('events', 'title')) {
                $table->string('title')->nullable()->change();
            }
            if (Schema::hasColumn('events', 'description')) {
                $table->longText('description')->nullable()->change();
            }
            if (Schema::hasColumn('events', 'start_date')) {
                $table->dateTime('start_date')->nullable()->change();
            }
        });

        Schema::table('packages', function (Blueprint $table) {
            if (Schema::hasColumn('packages', 'name')) {
                $table->string('name')->nullable()->change();
            }
            if (Schema::hasColumn('packages', 'description')) {
                $table->longText('description')->nullable()->change();
            }
        });

        Schema::table('galleries', function (Blueprint $table) {
            if (Schema::hasColumn('galleries', 'image_path')) {
                $table->string('image_path')->nullable()->change();
            }
        });

        Schema::table('testimonials', function (Blueprint $table) {
            if (Schema::hasColumn('testimonials', 'name')) {
                $table->string('name')->nullable()->change();
            }
            if (Schema::hasColumn('testimonials', 'comment')) {
                $table->text('comment')->nullable()->change();
            }
        });
    }

    public function down(): void
    {
    }
};
