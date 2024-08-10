<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Plant\StoreRequest;
use App\Http\Requests\Admin\Plant\UpdateRequest;
use App\Models\Plant;
use App\Models\PlantCategory;
use App\Models\PlantTag;
use App\Service\plantservice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\Exception;

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

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('plant.index');
    }

    public function show(Plant $plant)
    {
        return view('admin.plants.show', compact('plant'));
    }

    public function edit(Plant $plant)
    {
        return view('admin.plants.edit', compact('plant'));
    }

    public function update(UpdateRequest $request, Plant $plant)
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
