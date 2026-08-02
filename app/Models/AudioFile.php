<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class AudioFile extends Model
{
    protected $fillable = [
        "reciter_id",
        "riwayah_id",
        "moshaf_id",
        "surah_id",
        "recitation_style_id",
        "verses_range",
        "quality",
        "bitrate",
        "duration",
        "size",
        "format",
        "storage_driver",
        "path",
        "checksum",
        "meta_data",
        "is_verified",
        "published_at"
    ];

    protected $casts = [
        "verses_range" => "array",
        "meta_data" => "array",
        "is_verified" => "boolean",
        "published_at" => "datetime",
        "duration" => "integer",
        "size" => "integer"
    ];

    public function reciter(): BelongsTo
    {
        return $this->belongsTo(Reciter::class);
    }

    public function riwayah(): BelongsTo
    {
        return $this->belongsTo(Riwayah::class);
    }

    public function moshaf(): BelongsTo
    {
        return $this->belongsTo(Moshaf::class);
    }

    public function surah(): BelongsTo
    {
        return $this->belongsTo(Surah::class);
    }

    public function recitationStyle(): BelongsTo
    {
        return $this->belongsTo(RecitationStyle::class);
    }

    public function getVersesAttribute()
    {
        if ($this->verses_range && count($this->verses_range) == 2) {
            return Ayah::where("surah_id", $this->surah_id)
                ->whereBetween("ayah_number", $this->verses_range)
                ->get();
        }
        return collect();
    }

    public function getUrlAttribute(): string
    {
        if ($this->storage_driver === "s3") {
            return Storage::disk("s3")->url($this->path);
        }
        if ($this->storage_driver === "cdn") {
            return config("app.cdn_url") . "/" . $this->path;
        }
        return asset("storage/" . $this->path);
    }

    public function getDurationFormattedAttribute(): string
    {
        $minutes = floor($this->duration / 60);
        $seconds = $this->duration % 60;
        return sprintf("%d:%02d", $minutes, $seconds);
    }

    public function getSizeFormattedAttribute(): string
    {
        $bytes = $this->size;
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . " MB";
        }
        if ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . " KB";
        }
        return $bytes . " B";
    }

    public function scopeHighQuality($query)
    {
        return $query->where("quality", ">=", 192);
    }

    public function scopeVerified($query)
    {
        return $query->where("is_verified", true);
    }

    public function scopeByReciter($query, $reciterId)
    {
        return $query->where("reciter_id", $reciterId);
    }

    public function scopeByRiwayah($query, $riwayahId)
    {
        return $query->where("riwayah_id", $riwayahId);
    }

    public function scopeBySurah($query, $surahId)
    {
        return $query->where("surah_id", $surahId);
    }

    public function scopeByStyle($query, $styleId)
    {
        return $query->where("recitation_style_id", $styleId);
    }
}