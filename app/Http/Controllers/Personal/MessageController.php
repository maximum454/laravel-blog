<?php

namespace App\Http\Controllers\Personal;

use App\Events\StoreMessageEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\MessageStoreRequest;
use App\Http\Resources\Personal\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $messages = Message::all();
        $messages = MessageResource::collection($messages);
        return view('personal.message.index', compact('user', 'messages'));
    }

    public function store(MessageStoreRequest $request)
    {
        $data = $request->validated();
        $message = Message::create($data);

        broadcast(new StoreMessageEvent($message))->toOthers();

        return MessageResource::make($message)->resolve();
    }
}
