<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Plant;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainPlantsController extends Controller
{
    public function index()
    {
        $plants = Plant::paginate(6);
        $plantsRandom = Plant::get();
        if ($plantsRandom->count() >= 4) {
            $plantsRandom = Plant::get()->random(4);
        }
        return view('main.plants.index', compact('plants', 'plantsRandom'));
    }

    public function detail($plant)
    {
        $plant = Plant::find($plant);
        $date = Carbon::parse($plant->created_at);

        $relatedPlants = Plant::where('plant_category_id', $plant->plant_category_id)
            ->where('id', '!=', $plant->id)
            ->get()
            ->take(3);

        return view('main.plants.detail', compact('plant', 'date', 'relatedPlants'));
    }
}
