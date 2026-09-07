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
        Schema::create('dining_items', function (Blueprint $table) {
            $table->id();
            $table->string('title_mr')->nullable();
            $table->string('title_en')->nullable();
            $table->string('badge_mr')->nullable();
            $table->string('badge_en')->nullable();
            $table->string('badge_icon', 20)->nullable();
            $table->string('category_mr')->nullable();
            $table->string('category_en')->nullable();
            $table->text('short_description_mr')->nullable();
            $table->text('short_description_en')->nullable();
            $table->string('image')->nullable();
            $table->string('dietary_type', 50)->default('pure_veg');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dining_items');
    }
};
