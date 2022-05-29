<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class News extends Model
{
    use HasFactory;

    protected $fillable = [
        "author",
        "category_id",
        "source_id",
        "title",
        "description",
        "body",
        "status",
        "slug"
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, "category_id", "id");
    }
}
