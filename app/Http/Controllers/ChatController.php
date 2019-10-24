<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Repositories\UserEloquentRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }


    public function chat()
    {
        return view('admin.chat.chat');
    }

    public function send(Request $request)
    {
        $user = User::find(Auth::id());
        $this->saveToSession($request);
        event(new ChatEvent($request->message, $user));
    }

    public function saveToSession(request $request)
    {
        session()->put('chat', $request->chat);
    }

    public function getOldMessage()
    {
        session()->forget('chat');
        return session('chat');
    }

    public function deleteSession()
    {
        session()->forget('chat');
    }

}
