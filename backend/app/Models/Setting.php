<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'group',
    ];

    public static function get(string $key, $default = null)
    {
        $setting = static::where('key', $key)->first();
        return $setting ? $setting->value : $default;
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
        return static::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'group' => $group]
        );
    }
}