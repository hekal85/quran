<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Moshaf extends Model
{
    protected $fillable = [
        "riwayah_id",
        "name_arabic",
        "name_english",
        "script_type",
        "total_pages",
        "total_lines_per_page",
        "font_path",
        "metadata",
        "is_active"
    ];

    protected $casts = [
        "metadata" => "array",
        "is_active" => "boolean"
    ];

    public function riwayah(): BelongsTo
    {
        return $this->belongsTo(Riwayah::class);
    }

    public function audioFiles(): HasMany
    {
        return $this->hasMany(AudioFile::class);
    }

    public function scopeActive($query)
    {
        return $query->where("is_active", true);
    }
}