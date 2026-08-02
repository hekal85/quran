<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ListeningSession extends Model
{
    protected $fillable = [
        "user_id",
        "audio_file_id",
        "listened_duration",
        "last_position",
        "play_count",
        "is_completed",
        "ip_address",
        "user_agent"
    ];

    protected $casts = [
        "is_completed" => "boolean",
        "last_position" => "integer",
        "listened_duration" => "integer"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function audioFile(): BelongsTo
    {
        return $this->belongsTo(AudioFile::class);
    }

    public function getProgressAttribute(): float
    {
        if ($this->audioFile && $this->audioFile->duration > 0) {
            return round(($this->last_position / $this->audioFile->duration) * 100, 2);
        }
        return 0;
    }

    public function scopeCompleted($query)
    {
        return $query->where("is_completed", true);
    }

    public function scopeInProgress($query)
    {
        return $query->where("is_completed", false)
                     ->where("last_position", ">", 0);
    }
}