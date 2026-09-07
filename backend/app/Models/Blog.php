<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title_mr',
        'title_en',
        'slug',
        'short_description_mr',
        'short_description_en',
        'description_mr',
        'description_en',
        'featured_image',
        'blog_video',
        'youtube_url',
        'instagram_url',
        'status',
        'created_by',
        'updated_by',
        'title',
        'excerpt',
        'content',
        'category',
        'is_published',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $base = !empty($model->title_en) ? $model->title_en : ($model->title_mr ?? $model->title ?? 'blog');
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
            \Illuminate\Support\Facades\Cache::forget('api_blogs_mr');
            \Illuminate\Support\Facades\Cache::forget('api_blogs_en');
        });

        static::deleted(function () {
            \Illuminate\Support\Facades\Cache::forget('api_blogs_mr');
            \Illuminate\Support\Facades\Cache::forget('api_blogs_en');
        });
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
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

        if ($field === 'description') {
            return $this->content ?? null;
        }
        if ($field === 'short_description') {
            return $this->excerpt ?? null;
        }

        return $this->{$field} ?? null;
    }
}