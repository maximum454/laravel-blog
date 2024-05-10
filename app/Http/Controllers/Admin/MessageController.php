<?php

namespace App\Http\Controllers\Admin;

use App\Events\StoreMessageEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MessageStoreRequest;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use App\Models\User;

class MessageController extends Controller
{

    public function index(User $user)
    {
        $currentUser = auth()->user();
        $roles = User::getRoles();
        $userListMessage = Message::where('user_from', $currentUser->id)->orWhere('user_to', $currentUser->id)->get();

        return view('admin.message.index', compact('user', 'userListMessage','roles'));
    }
    public function show(User $user)
    {
        $currentUser = auth()->user();
        $roles = User::getRoles();
        $messages = Message::where('user_from', $currentUser->id)->where('user_to', $user->id)->get();


        return view('admin.message.show', compact('currentUser','user', 'messages','roles'));
    }
    public function chat(MessageStoreRequest $request, User $user)
    {
        $data = $request->validated();
        $message = Message::create($data);

        broadcast(new StoreMessageEvent($message, $user))->toOthers();

        return MessageResource::make($message)->resolve();
    }
}
