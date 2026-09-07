<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title_mr',
        'title_en',
        'short_description_mr',
        'short_description_en',
        'description_mr',
        'description_en',
        'image',
        'icon',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::saved(function () {
            \Illuminate\Support\Facades\Cache::forget('api_activities_mr');
            \Illuminate\Support\Facades\Cache::forget('api_activities_en');
        });

        static::deleted(function () {
            \Illuminate\Support\Facades\Cache::forget('api_activities_mr');
            \Illuminate\Support\Facades\Cache::forget('api_activities_en');
        });
    }

    public function getLocalized(string $field, string $lang = 'mr'): ?string
    {
        $primary = "{$field}_{$lang}";
        $fallback = $lang === 'mr' ? "{$field}_en" : "{$field}_mr";

        if (!empty($this->{$primary})) {
            return $this->{$primary};
        }
        if (!empty($this->{$fallback})) {
            return $this->{$fallback};
        }

        return $this->{$field} ?? null;
    }
}