<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title_mr',
        'title_en',
        'slug',
        'location_mr',
        'location_en',
        'event_date',
        'short_description_mr',
        'short_description_en',
        'description_mr',
        'description_en',
        'image',
        'status',
        'created_by',
        'updated_by',
        'title',
        'description',
        'location',
        'start_date',
        'end_date',
        'price',
        'banner_image',
        'is_active',
    ];

    protected $attributes = [
        'price' => null,
    ];

    protected function casts(): array
    {
        return [
            'event_date' => 'datetime',
            'start_date' => 'datetime',
            'end_date' => 'datetime',
            'price' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $base = !empty($model->title_en) ? $model->title_en : ($model->title_mr ?? $model->title ?? 'event');
                $model->slug = Str::slug($base) . '-' . Str::random(5);
            }
            if (auth()->check() && empty($model->created_by)) {
                $model->created_by = auth()->id();
            }
        });

        static::updating(function ($model) {
            if (auth()->check()) {
                $model->updated_by = auth()->id();
            }
        });

        static::saved(function () {
            \Illuminate\Support\Facades\Cache::forget('api_events_mr');
            \Illuminate\Support\Facades\Cache::forget('api_events_en');
        });

        static::deleted(function () {
            \Illuminate\Support\Facades\Cache::forget('api_events_mr');
            \Illuminate\Support\Facades\Cache::forget('api_events_en');
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