<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('icon')->nullable();
            $table->string('image')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->integer('column_span')->default(4); // 4 = col-lg-4 (3 per row), 6 = col-lg-6 (2 per row)
            $table->timestamps();
        });

        Schema::create('package_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->constrained()->cascadeOnDelete();
            $table->string('locale', 5);
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->string('price')->nullable();
            $table->string('btn_text')->nullable();
            $table->json('features')->nullable();
            $table->timestamps();

            $table->unique(['package_id', 'locale']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('package_translations');
        Schema::dropIfExists('packages');
    }
};
