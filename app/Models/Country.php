<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'flag_image',
        'short_description',
        'description',
        'requirements',
        'processing_time',
        'fees',
        'order',
        'is_popular',
        'is_active'
    ];

    protected $casts = [
        'is_popular' => 'boolean',
        'is_active' => 'boolean',
        'fees' => 'decimal:2',
    ];

    public function getFlagEmojiAttribute()
    {
        $flags = [
            'Malaysia' => '🇲🇾',
            'Australia' => '🇦🇺',
            'Denmark' => '🇩🇰',
            'Dubai (UAE)' => '🇦🇪',
            'Spain' => '🇪🇸',
            'South Africa' => '🇿🇦',
            'United States' => '🇺🇸',
            'Canada' => '🇨🇦',
            'United Kingdom' => '🇬🇧',
            'Schengen Countries' => '🇪🇺',
            'Pakistan' => '🇵🇰',
        ];

        return $flags[$this->name] ?? '🌍';
    }

}
