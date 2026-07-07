<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;

class FrontController extends Controller
{
    public function index()
    {
        $latest = Post::orderBy('created_at', 'desc')->where('post_type', 'news')->limit(5)->get();
        $headlines = Post::orderBy('created_at', 'desc')->where('post_type', 'news')->whereHas('taxonomy', function($q) { $q->where('slug', 'scroll-bar'); })->limit(5)->get();
        return Inertia::render('Home', compact('latest', 'headlines'));
    }
}
