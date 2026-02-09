<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('icon')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('service_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
            $table->string('locale', 5);
            $table->string('title');
            $table->string('short_desc')->nullable();
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->text('text1')->nullable();
            $table->text('text2')->nullable();
            $table->timestamps();

            $table->unique(['service_id', 'locale']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_translations');
        Schema::dropIfExists('services');
    }
};
