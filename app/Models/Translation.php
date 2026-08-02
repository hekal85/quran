<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Translation extends Model
{
    protected $fillable = [
        "ayah_id",
        "language_code",
        "translator_name",
        "translation_text",
        "is_approved"
    ];

    protected $casts = [
        "is_approved" => "boolean"
    ];

    public function ayah(): BelongsTo
    {
        return $this->belongsTo(Ayah::class);
    }

    public function scopeApproved($query)
    {
        return $query->where("is_approved", true);
    }

    public function scopeByLanguage($query, $language)
    {
        return $query->where("language_code", $language);
    }
}