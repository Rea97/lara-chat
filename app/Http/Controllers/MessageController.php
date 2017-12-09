<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return Message::with('user')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => 'required|string'
        ]);
        $data['user_id'] = auth()->id();

        $message = Message::create($data)->toArray();

        $message['user'] = auth()->user()->toArray();

        broadcast(new MessageSent($message))->toOthers();

        return $message;
    }
}
