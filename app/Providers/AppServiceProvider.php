<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Service;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share contact info and all services with all views
        View::composer('*', function ($view) {
            $locale = app()->getLocale();
            
            // Get contact for current locale
            $contact = Contact::forLocale($locale);
            
            // Get all active services for navigation
            if (!$view->offsetExists('allServices')) {
                $allServices = Service::active()->ordered()->with(['translations' => function ($q) use ($locale) {
                    $q->where('locale', $locale);
                }])->get();
                $view->with('allServices', $allServices);
            }
            
            $view->with('contact', $contact);
        });
    }
}
