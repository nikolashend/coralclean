<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'slug',
        'icon',
        'sort_order',
        'is_active',
        'show_on_home',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'show_on_home' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Get all translations for this service.
     */
    public function translations()
    {
        return $this->hasMany(ServiceTranslation::class);
    }

    /**
     * Get translation for specific locale.
     */
    public function translation(?string $locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->translations()->where('locale', $locale)->first();
    }

    /**
     * Get translated attribute value.
     */
    public function t(string $attribute, ?string $locale = null): mixed
    {
        $translation = $this->translation($locale);
        return $translation ? $translation->$attribute : null;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    public function scopeHomeOnly($query)
    {
        return $query->where('show_on_home', true);
    }
}
