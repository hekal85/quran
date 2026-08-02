<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tafsir extends Model
{
    protected $table = "tafsir";
    
    protected $fillable = [
        "ayah_id",
        "tafsir_name",
        "author_name",
        "tafsir_text",
        "references",
        "is_approved"
    ];

    protected $casts = [
        "references" => "array",
        "is_approved" => "boolean"
    ];

    public function ayah(): BelongsTo
    {
        return $this->belongsTo(Ayah::class);
    }

    public function scopeApproved($query)
    {
        return $query->where("is_approved", true);
    }

    public function scopeByAuthor($query, $author)
    {
        return $query->where("author_name", "LIKE", "%$author%");
    }
}