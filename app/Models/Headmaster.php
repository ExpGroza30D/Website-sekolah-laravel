<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Headmaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'quote',
        'image'
    ];

    // Tambahkan method boot untuk menangani event deleted
    protected static function boot()
    {
        parent::boot();

        // Ketika model dihapus, file gambar juga akan dihapus
        static::deleted(function ($headmaster) {
            if ($headmaster->image) {
                Storage::delete('public/' . $headmaster->image);
            }
        });

        // Optional: Ketika image diupdate, hapus file lama
        static::updating(function ($headmaster) {
            if ($headmaster->isDirty('image') && $headmaster->getOriginal('image')) {
                Storage::delete('public/' . $headmaster->getOriginal('image'));
            }
        });
    }
}