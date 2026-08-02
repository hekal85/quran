<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reciter extends Model
{
    protected $fillable = [
        "name_arabic",
        "name_english",
        "name_transliteration",
        "biography",
        "image_path",
        "birth_date",
        "death_date",
        "country",
        "is_active",
        "rating"
    ];

    protected $casts = [
        "birth_date" => "date",
        "death_date" => "date",
        "is_active" => "boolean"
    ];

    public function audioFiles(): HasMany
    {
        return $this->hasMany(AudioFile::class);
    }

    public function riwayat(): BelongsToMany
    {
        return $this->belongsToMany(Riwayah::class, "reciter_riwayah")
                    ->withPivot("is_primary", "order")
                    ->withTimestamps();
    }

    public function scopeActive($query)
    {
        return $query->where("is_active", true);
    }

    public function scopeEgyptian($query)
    {
        return $query->where("country", "Egypt");
    }

    public function scopeTopRated($query)
    {
        return $query->orderBy("rating", "desc");
    }
}