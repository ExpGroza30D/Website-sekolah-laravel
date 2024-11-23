<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Logika untuk menampilkan halaman welcome
        return view('welcome'); // Pastikan view 'welcome.blade.php' ada di folder resources/views
    }
}