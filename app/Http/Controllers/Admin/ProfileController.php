<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $roles = User::getRoles();
        return view('admin.profile.index', compact('user','roles'));
    }

    public function edit(User $user)
    {

        return view('admin.profile.edit', compact('user'));
    }

    public function update(ProfileUpdateRequest $request, User $user)
    {
        $data = $request->validated();
        if (isset($data['avatar'])) {
            $data['avatar'] = Storage::disk('public')->put('/images', $data['avatar']);
        }
        $user->update($data);
        return view('admin.profile.index', compact('user'));
    }
}
