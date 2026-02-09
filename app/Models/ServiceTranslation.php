<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceTranslation extends Model
{
    protected $fillable = [
        'service_id',
        'locale',
        'title',
        'short_desc',
        'description',
        'image_path',
        'text1',
        'text2',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
