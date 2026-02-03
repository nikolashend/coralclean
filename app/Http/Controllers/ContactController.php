<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function submit(Request $request, $locale = 'ru')
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'email' => 'nullable|email|max:255',
            'service' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $contactRequest = ContactRequest::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'service' => $request->service,
            'message' => $request->message,
            'locale' => $locale,
            'status' => 'new',
        ]);

        // Определяем сообщение в зависимости от языка
        $successMessages = [
            'ru' => 'Спасибо! Мы свяжемся с вами в ближайшее время.',
            'en' => 'Thank you! We will contact you soon.',
            'et' => 'Aitäh! Me võtame teiega peagi ühendust.',
        ];

        return redirect()->back()->with('success', $successMessages[$locale] ?? $successMessages['ru']);
    }
}