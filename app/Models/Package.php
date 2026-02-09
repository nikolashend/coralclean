<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'slug',
        'icon',
        'image',
        'sort_order',
        'is_active',
        'column_span',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'column_span' => 'integer',
    ];

    /**
     * Get all translations for this package.
     */
    public function translations()
    {
        return $this->hasMany(PackageTranslation::class);
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
    public function t(string $attribute, ?string $locale = null)
    {
        $translation = $this->translation($locale);
        if (!$translation) return null;
        return $translation->$attribute;
    }

    /**
     * Scope to active packages.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to ordered packages.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
