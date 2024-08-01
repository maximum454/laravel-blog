<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Service\plantservice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\Exception;

class PlantController extends Controller
{

    public $service;

    public function __construct(plantservice $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $plants = Plant::paginate(9);
        return view('admin.plants.index', compact('plants'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.plants.create', compact('categories', 'tags'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('plant.index');
    }

    public function show(Post $post)
    {
        return view('admin.plants.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.plants.edit', compact('post', 'categories', 'tags'));
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $post = $this->service->update($data, $post);
        return view('admin.plants.show', compact('post'));
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('plant.index');
    }

    public function comments(Post $post)
    {
        return view('admin.plants.comments', compact('post'));
    }

}
