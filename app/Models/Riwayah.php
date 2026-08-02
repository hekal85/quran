<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Riwayah extends Model
{
    protected $table = "riwayat";
    
    protected $fillable = [
        "name_arabic",
        "name_english",
        "description",
        "qiraat_type",
        "is_active"
    ];

    protected $casts = [
        "is_active" => "boolean"
    ];

    public function audioFiles(): HasMany
    {
        return $this->hasMany(AudioFile::class);
    }

    public function moshafs(): HasMany
    {
        return $this->hasMany(Moshaf::class);
    }

    public function reciters(): BelongsToMany
    {
        return $this->belongsToMany(Reciter::class, "reciter_riwayah")
                    ->withPivot("is_primary", "order")
                    ->withTimestamps();
    }

    public function scopeActive($query)
    {
        return $query->where("is_active", true);
    }
}