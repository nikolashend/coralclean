<?php

namespace App\Mail;

use App\Models\ContactRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactRequestConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public ContactRequest $contactRequest
    ) {}

    public function envelope(): Envelope
    {
        $subjects = [
            'ru' => 'Ваша заявка принята - CoralClean',
            'en' => 'Your request has been received - CoralClean',
            'et' => 'Teie päring on vastu võetud - CoralClean',
        ];

        return new Envelope(
            subject: $subjects[$this->contactRequest->locale] ?? $subjects['ru'],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-request-confirmation',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
