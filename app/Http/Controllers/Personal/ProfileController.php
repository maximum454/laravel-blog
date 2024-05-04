<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $roles = User::getRoles();
        return view('personal.profile.index', compact('user','roles'));
    }

    public function edit(User $user)
    {

        return view('personal.profile.edit', compact('user'));
    }

    public function update(ProfileUpdateRequest $request, User $user)
    {
        $data = $request->validated();
        if (isset($data['avatar'])) {
            $data['avatar'] = Storage::disk('public')->put('/images', $data['avatar']);
        }
        $user->update($data);
        return view('personal.profile.index', compact('user'));
    }
}
