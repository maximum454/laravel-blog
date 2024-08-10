<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PlantStoreRequest;
use App\Http\Requests\Admin\PlantUpdateRequest;
use App\Models\Plant;
use App\Service\PlantService;
use Illuminate\Support\Str;

class PlantController extends Controller
{

    public $service;

    public function __construct(PlantService $service)
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
        return view('admin.plants.create');
    }

    public function store(PlantStoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('plant.index');
    }

    public function show(Plant $plant)
    {
        $plant->content = Str::limit(strip_tags($plant->content),200);
        return view('admin.plants.show', compact('plant'));
    }

    public function edit(Plant $plant)
    {
        return view('admin.plants.edit', compact('plant'));
    }

    public function update(PlantUpdateRequest $request, Plant $plant)
    {
        $data = $request->validated();
        $plant = $this->service->update($data, $plant);
        return view('admin.plants.show', compact('plant'));
    }

    public function delete(Plant $plant)
    {
        $plant->delete();
        return redirect()->route('plant.index');
    }
}
