<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'ip_address',
        'user_agent',
        'last_visit',
        'visit_count'
    ];

    protected $casts = [
        'last_visit' => 'datetime'
    ];
}