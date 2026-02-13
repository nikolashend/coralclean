<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceTranslation extends Model
{
    protected $fillable = [
        'service_id',
        'locale',
        'title',
        'subtitle',
        'short_desc',
        'bullets',
        'price_anchor',
        'pricing_table',
        'cta_text',
        'description',
        'image_path',
        'text1',
        'text2',
        'faq',
        'included',
        'not_included',
        'addons',
        'process',
        'guarantee',
    ];

    protected $casts = [
        'bullets' => 'array',
        'faq' => 'array',
        'included' => 'array',
        'not_included' => 'array',
        'addons' => 'array',
        'pricing_table' => 'array',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
