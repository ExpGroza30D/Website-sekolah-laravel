<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name',
        'title',
        'description',
        'image',
        'facebook_url',
        'twitter_url',
        'instagram_url',
    ];
}