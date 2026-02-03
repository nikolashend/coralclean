<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return redirect('/ru');
});

Route::prefix('{locale}')->where(['locale' => 'ru|en|et'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
});