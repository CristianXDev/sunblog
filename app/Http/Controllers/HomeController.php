<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class HomeController extends Controller
{
    public function blog()
    {
        $posts = Post::with(['user', 'category'])
                    ->where('is_published', true)
                    ->orderBy('published_at', 'desc')
                    ->paginate(10);
                    
        $categories = Category::all();
        
        return view('home.blog', compact('posts', 'categories'));
    }

    public function post($id){

        $post = Post::with(['user', 'category', 'comments.user'])
        ->where('is_published', true)
        ->findOrFail($id);

        $categories = Category::all();
        $recentPosts = Post::where('is_published', true)
        ->where('id', '!=', $id)
        ->orderBy('published_at', 'desc')
        ->limit(3)
        ->get();

        return view('home.viewPost', compact('post', 'categories', 'recentPosts'));
    }
}