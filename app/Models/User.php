<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        "name", "email", "password", "country", "preferences"
    ];

    protected $hidden = [
        "password", "remember_token",
    ];

    protected $casts = [
        "email_verified_at" => "datetime",
        "preferences" => "array",
        "is_admin" => "boolean"
    ];

    public function listeningSessions(): HasMany
    {
        return $this->hasMany(ListeningSession::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(AudioFile::class, "user_favorites");
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}