<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Announcement;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(9);
        $announcements = Announcement::where('is_active', true)->latest()->get();
        return view('blog.index', compact('blogs', 'announcements'));
    }

    public function show($id)
    {   

        
        $blog = Blog::find($id);
        
        if (!$blog) {
            $blog = Announcement::findOrFail($id);
        }
        
        return view('blog.show', compact('blog'));
    }

    
}