<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Post;

class LikedController extends Controller
{
    public function index()
    {
        $currentUser = auth()->user();
        $posts = $currentUser->likedPosts;
        return view('personal.liked.index', compact('posts'));
    }

    public function delete(Post $post)
    {
        $currentUser = auth()->user();
        $currentUser->likedPosts()->detach($post->id);
        return redirect()->route('like.index');
    }
}
