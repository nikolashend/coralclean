<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use App\Mail\ContactRequestNotification;
use App\Mail\ContactRequestConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function submit(Request $request, $locale = 'ru')
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'email' => 'nullable|email|max:255',
            'service' => 'nullable|string|max:255',
            'preferred_date' => 'nullable|date',
            'message' => 'nullable|string|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $contactRequest = ContactRequest::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'service' => $request->service,
            'preferred_date' => $request->preferred_date,
            'message' => $request->message,
            'locale' => $locale,
            'status' => 'new',
        ]);

        // Получаем email(ы) администратора из настроек или используем дефолтный
        $adminEmails = $this->getAdminEmails();

        // Отправляем уведомление администратору
        try {
            foreach ($adminEmails as $adminEmail) {
                Mail::to($adminEmail)->send(new ContactRequestNotification($contactRequest));
            }
        } catch (\Exception $e) {
            Log::error('Failed to send admin notification email: ' . $e->getMessage());
        }

        // Отправляем подтверждение клиенту, если указан email
        if ($contactRequest->email) {
            try {
                Mail::to($contactRequest->email)->send(new ContactRequestConfirmation($contactRequest));
            } catch (\Exception $e) {
                Log::error('Failed to send client confirmation email: ' . $e->getMessage());
            }
        }

        // Определяем сообщение в зависимости от языка
        $successMessages = [
            'ru' => 'Спасибо! Мы свяжемся с вами в ближайшее время.',
            'en' => 'Thank you! We will contact you soon.',
            'et' => 'Aitäh! Me võtame teiega peagi ühendust.',
        ];

        return response()->json([
            'success' => true,
            'message' => $successMessages[$locale] ?? $successMessages['ru']
        ]);
    }

    /**
     * Получить список email адресов администраторов
     */
    private function getAdminEmails(): array
    {
        // Пытаемся получить из настроек в БД
        $settings = \DB::table('site_settings')
            ->where('key', 'admin_emails')
            ->first();

        if ($settings && $settings->value) {
            $value = json_decode($settings->value, true);
            
            // Если это массив локализованных значений
            if (is_array($value)) {
                // Берем первое непустое значение
                $emailString = $value['ru'] ?? $value['en'] ?? $value['et'] ?? '';
            } else {
                $emailString = $value;
            }

            if ($emailString) {
                // Разбиваем по запятой и очищаем пробелы
                $emails = array_map('trim', explode(',', $emailString));
                $validEmails = array_filter($emails, function($email) {
                    return filter_var($email, FILTER_VALIDATE_EMAIL);
                });
                
                if (!empty($validEmails)) {
                    return $validEmails;
                }
            }
        }

        // Дефолтный email
        return ['info@coralclean.ee'];
    }
}