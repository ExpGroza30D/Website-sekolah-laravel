<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryComment;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('welcome', compact('galleries'));
    }

    public function show(Gallery $gallery)
    {
        $gallery->load('comments');
        return view('gallery.show', compact('gallery'));
    }

    public function comment(Request $request, Gallery $gallery)
    {
        $request->validate([
            'comment' => 'required|string',
            'name' => 'nullable|string|max:255',
        ]);

        $comment = $gallery->comments()->create([
            'name' => $request->name ?: 'Anonymous',
            'comment' => $request->comment,
        ]);

        return response()->json([
            'success' => true,
            'comment' => $comment
        ]);
    }
}