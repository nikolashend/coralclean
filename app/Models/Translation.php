<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $fillable = [
        'locale',
        'group',
        'key',
        'value',
    ];

    /**
     * Get translation value.
     */
    public static function getTranslation(string $group, string $key, ?string $locale = null): ?string
    {
        $locale = $locale ?? app()->getLocale();

        $translation = static::where('group', $group)
            ->where('key', $key)
            ->where('locale', $locale)
            ->first();

        return $translation ? $translation->value : null;
    }

    /**
     * Get all translations for a group and locale.
     */
    public static function getGroup(string $group, ?string $locale = null): array
    {
        $locale = $locale ?? app()->getLocale();

        return static::where('group', $group)
            ->where('locale', $locale)
            ->pluck('value', 'key')
            ->toArray();
    }

    /**
     * Set a translation value.
     */
    public static function setTranslation(string $group, string $key, string $value, ?string $locale = null): void
    {
        $locale = $locale ?? app()->getLocale();

        static::updateOrCreate(
            ['group' => $group, 'key' => $key, 'locale' => $locale],
            ['value' => $value]
        );
    }
}
