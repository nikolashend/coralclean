<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageTranslation extends Model
{
    protected $fillable = [
        'package_id',
        'locale',
        'title',
        'subtitle',
        'description',
        'price',
        'btn_text',
        'features',
    ];

    protected $casts = [
        'features' => 'array',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
