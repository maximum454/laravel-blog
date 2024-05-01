<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;

class PersonalController extends Controller
{
    public function index()
    {
        return view('personal.main.index');
    }

    public function liked()
    {
        return view('personal.liked.index');
    }

    public function comments()
    {
        return view('personal.comment.index');
    }


}
