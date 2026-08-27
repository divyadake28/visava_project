<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_name',
        'client_designation_mr',
        'client_designation_en',
        'review_mr',
        'review_en',
        'client_image',
        'rating',
        'status',
        'name',
        'designation',
        'comment',
        'avatar',
        'is_approved',
    ];

    protected function casts(): array
    {
        return [
            'rating' => 'integer',
            'is_approved' => 'boolean',
        ];
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

        if ($field === 'review') {
            return $this->comment ?? null;
        }
        if ($field === 'client_designation') {
            return $this->designation ?? null;
        }

        return $this->{$field} ?? null;
    }
}