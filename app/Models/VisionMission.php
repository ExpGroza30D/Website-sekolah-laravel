<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class VisionMission extends Model
{
    protected $fillable = [
        'vision_title',
        'vision_content',
        'vision_image',
        'mission_title',
        'mission_content',
        'mission_image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleted(function ($visionMission) {
            if ($visionMission->vision_image) {
                Storage::delete('public/' . $visionMission->vision_image);
            }
            if ($visionMission->mission_image) {
                Storage::delete('public/' . $visionMission->mission_image);
            }
        });

        static::updating(function ($visionMission) {
            if ($visionMission->isDirty('vision_image') && $visionMission->getOriginal('vision_image')) {
                Storage::delete('public/' . $visionMission->getOriginal('vision_image'));
            }
            if ($visionMission->isDirty('mission_image') && $visionMission->getOriginal('mission_image')) {
                Storage::delete('public/' . $visionMission->getOriginal('mission_image'));
            }
        });
    }
}