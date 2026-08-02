<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ayah extends Model
{
    protected $fillable = [
        "surah_id",
        "ayah_number",
        "juz_number",
        "hizb_number",
        "rub_number",
        "text_arabic",
        "text_uthmani",
        "text_simple",
        "text_emlaey",
        "page_number"
    ];

    public function surah(): BelongsTo
    {
        return $this->belongsTo(Surah::class);
    }

    public function translations(): HasMany
    {
        return $this->hasMany(Translation::class);
    }

    public function tafsirs(): HasMany
    {
        return $this->hasMany(Tafsir::class);
    }

    public function getFullAyahAttribute(): string
    {
        return $this->surah->name_arabic . " (" . $this->ayah_number . ")";
    }

    public function getTextWithSurahAttribute(): string
    {
        return "{$this->surah->name_arabic} {$this->ayah_number}: {$this->text_arabic}";
    }
}