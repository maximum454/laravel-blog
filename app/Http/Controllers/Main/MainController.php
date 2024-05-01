<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('main.index');
    }
    public function about()
    {
        return view('main.about');
    }
    public function blog()
    {
        $posts = Post::paginate(6);
        $postsRandom = Post::get()->random(4);
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
        return view('main.blog', compact('posts','postsRandom', 'likedPosts'));
    }
    public function contact()
    {
        return view('main.contact');
    }
    public function post($post)
    {
        $post = Post::find($post);
        $date = Carbon::parse($post->created_at);
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->get()
            ->take(3);
        return view('main.post', compact('post','date', 'relatedPosts'));
    }
}
