<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Surah extends Model
{
    protected $fillable = [
        "surah_number",
        "name_arabic",
        "name_english",
        "name_transliteration",
        "total_verses",
        "revelation_place",
        "juz_start",
        "juz_end",
        "is_makki"
    ];

    public function ayahs(): HasMany
    {
        return $this->hasMany(Ayah::class);
    }

    public function audioFiles(): HasMany
    {
        return $this->hasMany(AudioFile::class);
    }

    public function audioAyahs(): HasManyThrough
    {
        return $this->hasManyThrough(Ayah::class, AudioFile::class);
    }

    public function scopeMakki($query)
    {
        return $query->where("is_makki", true);
    }

    public function scopeMadani($query)
    {
        return $query->where("is_makki", false);
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->where("name_arabic", "LIKE", "%$keyword%")
                     ->orWhere("name_english", "LIKE", "%$keyword%");
    }
}