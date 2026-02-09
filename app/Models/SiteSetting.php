<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = [
        'key',
        'group',
        'type',
        'value',
        'label',
    ];

    protected $casts = [
        'value' => 'array', // stores {'ru': '...', 'en': '...', 'et': '...'}
    ];

    /**
     * Get setting value for current locale.
     */
    public function getLocalizedValue(?string $locale = null): ?string
    {
        $locale = $locale ?? app()->getLocale();
        $value = $this->value;

        if (is_array($value)) {
            return $value[$locale] ?? $value['ru'] ?? null;
        }

        return $value;
    }

    /**
     * Helper: get a setting by key.
     */
    public static function get(string $key, ?string $locale = null, $default = null)
    {
        $setting = Cache::remember("site_setting_{$key}", 3600, function () use ($key) {
            return static::where('key', $key)->first();
        });

        if (!$setting) return $default;

        return $setting->getLocalizedValue($locale) ?? $default;
    }

    /**
     * Helper: set a setting by key.
     */
    public static function set(string $key, $value, string $group = 'general', string $label = ''): void
    {
        static::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'group' => $group, 'label' => $label]
        );

        Cache::forget("site_setting_{$key}");
    }

    /**
     * Get all settings by group.
     */
    public static function getGroup(string $group): \Illuminate\Database\Eloquent\Collection
    {
        return static::where('group', $group)->get();
    }
}
