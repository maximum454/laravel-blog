<?php

namespace App\Http\Controllers\Admin;

use App\Events\StoreMessageEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MessageStoreRequest;
use App\Http\Resources\MessageResource;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $messages = Message::all();
        $messages = MessageResource::collection($messages);
        return view('admin.message.index', compact('user', 'messages'));
    }

    public function store(MessageStoreRequest $request)
    {
        $data = $request->validated();
        $message = Message::create($data);

        broadcast(new StoreMessageEvent($message))->toOthers();

        return MessageResource::make($message)->resolve();
    }
}
