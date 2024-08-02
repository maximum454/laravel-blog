<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePlantCategoryRequest;
use App\Http\Requests\Admin\UpdatePlantCategoryRequest;
use App\Models\PlantCategory;
use Illuminate\Http\Request;

class PlantCategoryController extends Controller
{
    public function index()
    {
        $plant_categories = PlantCategory::all();

        return view('admin.plant_categories.index', compact('plant_categories'));
    }

    public function create()
    {
        return view('admin.plant_categories.create');
    }

    public function store(StorePlantCategoryRequest $request)
    {
        $data = $request->validated();
        PlantCategory::firstOrCreate($data);
        return redirect()->route('plant.category.index');
    }

    public function show(PlantCategory $plantCategory)
    {
        return view('admin.plant_categories.show', compact('plantCategory'));
    }

    public function edit(PlantCategory $plantCategory)
    {
        return view('admin.plant_categories.edit', compact('plantCategory'));
    }

    public function update(UpdatePlantCategoryRequest $request, PlantCategory $plantCategory)
    {
        $data = $request->validated();
        $plantCategory->update($data);
        return view('admin.plant_categories.show', compact('plantCategory'));
    }

    public function delete(PlantCategory $plantCategory)
    {
        $plantCategory->delete();
        return redirect()->route('plant_categories.index');
    }
}
