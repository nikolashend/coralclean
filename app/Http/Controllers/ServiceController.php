<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index($locale = 'ru')
    {
        if (!in_array($locale, ['ru', 'en', 'et'])) {
            $locale = 'ru';
        }

        app()->setLocale($locale);

        $services = Service::active()->ordered()->with(['translations' => function ($q) use ($locale) {
            $q->where('locale', $locale);
        }])->get();

        $contact = Contact::forLocale($locale);

        $packages = Package::active()->ordered()->with(['translations' => function ($q) use ($locale) {
            $q->where('locale', $locale);
        }])->get();

        return view('services-hub', [
            'locale' => $locale,
            'services' => $services,
            'allServices' => $services,
            'contact' => $contact,
            'packages' => $packages,
        ]);
    }

    public function show($locale = 'ru', $slug = '')
    {
        if (!in_array($locale, ['ru', 'en', 'et'])) {
            $locale = 'ru';
        }

        app()->setLocale($locale);

        // Try to find service in DB
        $service = Service::where('slug', $slug)->where('is_active', true)->first();

        if (!$service) {
            abort(404);
        }

        // Get all active services for sidebar navigation
        $allServices = Service::active()->ordered()->with(['translations' => function ($q) use ($locale) {
            $q->where('locale', $locale);
        }])->get();

        // Load current service translation
        $service->load(['translations' => function ($q) use ($locale) {
            $q->where('locale', $locale);
        }]);

        // Keep backward compatibility
        $serviceKey = str_replace('-', '_', str_replace('-cleaning', '', $slug));

        $contact = Contact::forLocale($locale);

        $packages = Package::active()->ordered()->with(['translations' => function ($q) use ($locale) {
            $q->where('locale', $locale);
        }])->get();

        return view('service', [
            'locale' => $locale,
            'slug' => $slug,
            'serviceKey' => $serviceKey,
            'service' => $service,
            'allServices' => $allServices,
            'services' => $allServices->pluck('slug')->toArray(),
            'contact' => $contact,
            'packages' => $packages,
        ]);
    }
}
