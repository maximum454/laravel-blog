<?php

namespace App\Http\Controllers\Admin;

use App\Events\StoreMessageEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MessageStoreRequest;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Http\Resources\MessageResource;
use App\Jobs\StoreUserJob;
use App\Mail\User\PasswordMail;
use App\Models\Message;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $currentUser = auth()->user();
        $user = User::where('id','!=',$currentUser->id)->paginate(9);
        $roles = User::getRoles();
        return view('admin.user.index', compact('user','roles'));
    }

    public function create()
    {
        $roles = User::getRoles();
        return view('admin.user.create',  compact('roles'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        StoreUserJob::dispatch($data);

        return redirect()->route('user.index');
    }

    public function show(User $user)
    {
        $currentUser = auth()->user();
        $messages = Message::where('user_from', $currentUser->id)->get();
        if($messages){
            $messages = MessageResource::collection($messages);
        }
        return view('admin.user.show', compact('user','messages'));
    }

    public function edit(User $user)
    {
        $roles = User::getRoles();
        return view('admin.user.edit', compact('user','roles'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        return view('admin.user.show', compact('user'));
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }
}
