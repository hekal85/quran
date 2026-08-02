<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RecitationStyle extends Model
{
    protected $table = "recitation_styles";
    
    protected $fillable = [
        "name_arabic",
        "name_english",
        "description",
        "is_active"
    ];

    protected $casts = [
        "is_active" => "boolean"
    ];

    public function audioFiles(): HasMany
    {
        return $this->hasMany(AudioFile::class);
    }

    public function scopeActive($query)
    {
        return $query->where("is_active", true);
    }
}