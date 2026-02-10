<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Add new fields to service_translations for premium cards
        Schema::table('service_translations', function (Blueprint $table) {
            $table->string('subtitle')->nullable()->after('title');
            $table->json('bullets')->nullable()->after('short_desc');
            $table->string('price_anchor')->nullable()->after('bullets');
            $table->string('cta_text')->nullable()->after('price_anchor');
            $table->json('faq')->nullable()->after('text2'); // [{q: '', a: ''}, ...]
            $table->json('included')->nullable()->after('faq');
            $table->json('not_included')->nullable()->after('included');
            $table->json('addons')->nullable()->after('not_included');
            $table->text('process')->nullable()->after('addons');
            $table->text('guarantee')->nullable()->after('process');
        });

        // Add show_on_home flag to services
        Schema::table('services', function (Blueprint $table) {
            $table->boolean('show_on_home')->default(true)->after('is_active');
        });

        // Add front_body and back_body to package_translations for flip cards
        Schema::table('package_translations', function (Blueprint $table) {
            $table->text('front_body')->nullable()->after('subtitle');
            $table->text('back_body')->nullable()->after('front_body');
        });
    }

    public function down(): void
    {
        Schema::table('service_translations', function (Blueprint $table) {
            $table->dropColumn(['subtitle', 'bullets', 'price_anchor', 'cta_text', 'faq', 'included', 'not_included', 'addons', 'process', 'guarantee']);
        });

        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('show_on_home');
        });

        Schema::table('package_translations', function (Blueprint $table) {
            $table->dropColumn(['front_body', 'back_body']);
        });
    }
};
