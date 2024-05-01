<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
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


}
