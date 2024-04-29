<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Mail\Contact\ContactMail;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.contact.index');
    }

    public function submit(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'message' => 'required|min:10',
        ]);

        dd($validated);

        Mail::to('maximum454@gmail.com')->send(new ContactMail($validated));

        return back()->with('success', 'Thank you for your message!');
    }
}
