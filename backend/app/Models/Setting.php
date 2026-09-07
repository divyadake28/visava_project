<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'group',
    ];

    protected static ?array $allSettingsCache = null;

    protected static function boot()
    {
        parent::boot();

        static::saved(function () {
            static::$allSettingsCache = null;
            Cache::forget('api_settings_mr');
            Cache::forget('api_settings_en');
        });

        static::deleted(function () {
            static::$allSettingsCache = null;
            Cache::forget('api_settings_mr');
            Cache::forget('api_settings_en');
        });
    }

    public static function getAllCached(): array
    {
        if (static::$allSettingsCache === null) {
            static::$allSettingsCache = static::all()->pluck('value', 'key')->toArray();
        }
        return static::$allSettingsCache;
    }

    public static function get(string $key, $default = null)
    {
        $all = static::getAllCached();
        return array_key_exists($key, $all) ? $all[$key] : $default;
    }

    public static function getLocalized(string $key, string $lang = 'mr', $default = null)
    {
        $primaryKey = "{$key}_{$lang}";
        $primaryVal = static::get($primaryKey);
        if ($primaryVal !== null && $primaryVal !== '') {
            return $primaryVal;
        }

        $fallbackLang = $lang === 'mr' ? 'en' : 'mr';
        $fallbackKey = "{$key}_{$fallbackLang}";
        $fallbackVal = static::get($fallbackKey);
        if ($fallbackVal !== null && $fallbackVal !== '') {
            return $fallbackVal;
        }

        return static::get($key, $default);
    }

    public static function set(string $key, $value, string $group = 'general'): self
    {
        static::$allSettingsCache = null;
        return static::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'group' => $group]
        );
    }
}