<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private $validServices = [
        'home-cleaning',
        'glass-cleaning',
        'garden-cleaning',
        'office-cleaning',
        'carpet-cleaning',
        'renovation-cleaning',
    ];

    public function show($locale = 'ru', $slug = '')
    {
        if (!in_array($locale, ['ru', 'en', 'et'])) {
            $locale = 'ru';
        }

        if (!in_array($slug, $this->validServices)) {
            abort(404);
        }

        app()->setLocale($locale);

        $serviceKey = str_replace('-', '_', str_replace('-cleaning', '', $slug));

        return view('service', [
            'locale' => $locale,
            'slug' => $slug,
            'serviceKey' => $serviceKey,
            'services' => $this->validServices,
        ]);
    }
}
