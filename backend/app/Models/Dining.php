<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dining extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'dining_items';

    protected $fillable = [
        'title_mr',
        'title_en',
        'badge_mr',
        'badge_en',
        'badge_icon',
        'category_mr',
        'category_en',
        'short_description_mr',
        'short_description_en',
        'image',
        'dietary_type',
        'sort_order',
        'is_active',
        'status',
        'created_by',
        'updated_by',
    ];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::saved(function () {
            \Illuminate\Support\Facades\Cache::forget('api_dining_mr_all');
            \Illuminate\Support\Facades\Cache::forget('api_dining_en_all');
        });

        static::deleted(function () {
            \Illuminate\Support\Facades\Cache::forget('api_dining_mr_all');
            \Illuminate\Support\Facades\Cache::forget('api_dining_en_all');
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
