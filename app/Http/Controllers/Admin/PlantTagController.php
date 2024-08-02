<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use App\Models\PlantTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PlantTagController extends Controller
{
    public function index()
    {
        $tags = PlantTag::all();
        return view('admin.plant_tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.plant_tags.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Tag::firstOrCreate($data);
        return redirect()->route('plant.tag.index');
    }

    public function show(Tag $tag)
    {
        return view('admin.plant_tags.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('admin.plant_tags.edit', compact('tag'));
    }

    public function update(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $tag->update($data);
        return view('admin.plant_tags.show', compact('tag'));
    }

    public function delete(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('plant.tag.index');
    }
}
