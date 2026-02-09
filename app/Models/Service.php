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
    ];

    protected $casts = [
        'is_active' => 'boolean',
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
    public function t(string $attribute, ?string $locale = null): ?string
    {
        $translation = $this->translation($locale);
        return $translation ? $translation->$attribute : null;
    }

    /**
     * Scope to active services.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to ordered services.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
