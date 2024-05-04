<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PersonalController extends Controller
{
    public function index()
    {
        return view('admin.main.index');
    }

    public function liked()
    {
        return view('admin.liked.index');
    }

    public function comments()
    {
        return view('admin.comment.index');
    }


}
