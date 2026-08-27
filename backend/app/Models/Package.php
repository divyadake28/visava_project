<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Package extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title_mr',
        'title_en',
        'slug',
        'duration_mr',
        'duration_en',
        'price',
        'short_description_mr',
        'short_description_en',
        'description_mr',
        'description_en',
        'featured_image',
        'status',
        'created_by',
        'updated_by',
        'name',
        'summary',
        'description',
        'duration',
        'discounted_price',
        'inclusions',
        'exclusions',
        'is_featured',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'discounted_price' => 'decimal:2',
            'inclusions' => 'array',
            'exclusions' => 'array',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $base = !empty($model->title_en) ? $model->title_en : ($model->title_mr ?? $model->name ?? 'package');
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

        if ($field === 'title') {
            return $this->name ?? null;
        }
        if ($field === 'short_description') {
            return $this->summary ?? null;
        }

        return $this->{$field} ?? null;
    }
}