<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $currentUser = auth()->user();
        $comments = $currentUser->comments;
        return view('admin.comment.index', compact('comments'));
    }
    public function edit(Comment $comment)
    {
        return view('admin.comment.edit', compact('comment'));
    }
    public function update(UpdateRequest $request, Comment $comment)
    {
        $data = $request->validated();
        $comment->update($data);
        return redirect()->route('comment.index');
    }
    public function delete(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comment.index');
    }
}
