<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bookmark extends Model
{
    protected $fillable = [
        "user_id",
        "audio_file_id",
        "ayah_id",
        "position",
        "note",
        "is_public"
    ];

    protected $casts = [
        "is_public" => "boolean",
        "position" => "integer"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function audioFile(): BelongsTo
    {
        return $this->belongsTo(AudioFile::class);
    }

    public function ayah(): BelongsTo
    {
        return $this->belongsTo(Ayah::class);
    }

    public function scopePublic($query)
    {
        return $query->where("is_public", true);
    }

    public function scopePrivate($query)
    {
        return $query->where("is_public", false);
    }
}