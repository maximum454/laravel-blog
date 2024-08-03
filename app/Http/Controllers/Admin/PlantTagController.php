<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
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
        PlantTag::firstOrCreate($data);
        return redirect()->route('plant.tag.index');
    }

    public function show(PlantTag $tag)
    {
        return view('admin.plant_tags.show', compact('tag'));
    }

    public function edit(PlantTag $tag)
    {
        return view('admin.plant_tags.edit', compact('tag'));
    }

    public function update(UpdateRequest $request, PlantTag $tag)
    {
        $data = $request->validated();
        $tag->update($data);
        return view('admin.plant_tags.show', compact('tag'));
    }

    public function delete(PlantTag $tag)
    {
        $tag->delete();
        return redirect()->route('plant.tag.index');
    }
}
