<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Plant;
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
        return view('main.blog', compact('posts', 'postsRandom', 'likedPosts'));
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

        return view('main.post', compact('post', 'date', 'relatedPosts'));
    }

    public function plants()
    {
        $plants = Plant::paginate(6);
        $plantsRandom = Plant::get();
        if ($plantsRandom->count() >= 4) {
            $plantsRandom = Plant::get()->random(4);
        }
        /*$likedplants = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);*/
        return view('main.plants.index', compact('plants', 'plantsRandom'));
    }

    public function comment(Post $post, StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['post_id'] = $post->id;
        Comment::create($data);

        return redirect()->route('main.blog.post', $post->id);
    }
    public function like(Post $post)
    {
        auth()->user()->likedPosts()->toggle($post->id);
        return redirect()->back();
    }
}
