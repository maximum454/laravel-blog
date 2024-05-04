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
    public function index()
    {
        $user = auth()->user();
        $userListMessage = Message::where('recepient_id', $user->id)->distinct()->get(['user_id']);
        $roles = User::getRoles();

        return view('admin.message.index', compact('user', 'userListMessage','roles'));
    }

    public function store(MessageStoreRequest $request)
    {
        $data = $request->validated();
        $message = Message::create($data);

        broadcast(new StoreMessageEvent($message))->toOthers();

        return MessageResource::make($message)->resolve();
    }
}
