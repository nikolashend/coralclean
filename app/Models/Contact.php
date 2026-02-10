<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'locale',
        'phone',
        'phone_clean',
        'whatsapp',
        'email',
        'instagram',
        'facebook',
        'address',
    ];

    /**
     * Get contact info for current locale
     */
    public static function forLocale(string $locale): ?Contact
    {
        return static::where('locale', $locale)->first();
    }
}
