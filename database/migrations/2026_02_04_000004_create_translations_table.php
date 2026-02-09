<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale', 5);
            $table->string('group'); // e.g. 'home', 'nav', 'form'
            $table->string('key');
            $table->text('value')->nullable();
            $table->timestamps();

            $table->unique(['locale', 'group', 'key']);
            $table->index(['group', 'locale']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('translations');
    }
};
