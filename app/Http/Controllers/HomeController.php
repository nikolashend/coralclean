<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($locale = 'ru')
    {
        if (!in_array($locale, ['ru', 'en', 'et'])) {
            $locale = 'ru';
        }

        app()->setLocale($locale);

        return view('home', [
            'locale' => $locale
        ]);
    }
}