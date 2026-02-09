<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
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

        $packages = Package::active()->ordered()->with(['translations' => function ($q) use ($locale) {
            $q->where('locale', $locale);
        }])->get();

        return view('home', [
            'locale' => $locale,
            'services' => $services,
            'packages' => $packages,
        ]);
    }
}