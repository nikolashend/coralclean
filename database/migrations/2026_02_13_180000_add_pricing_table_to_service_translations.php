<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('service_translations', function (Blueprint $table) {
            $table->json('pricing_table')->nullable()->after('price_anchor');
        });
    }

    public function down(): void
    {
        Schema::table('service_translations', function (Blueprint $table) {
            $table->dropColumn('pricing_table');
        });
    }
};
