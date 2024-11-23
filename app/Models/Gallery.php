<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'category',
        'content'
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(GalleryComment::class);
    }
}