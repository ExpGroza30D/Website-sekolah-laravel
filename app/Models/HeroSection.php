<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $fillable = [
        'title',
        'school_name',
        'subtitle',
        'primary_button_text',
        'primary_button_link',
        'secondary_button_text',
        'secondary_button_link',
        'background_image',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}