<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Events\PusherPublicEvent;
use App\Events\MessageSent;


class ChatsController extends Controller
{
        public function __construct()
        {
            $this->middleware('auth');
        }

        public function index()
        {
            // broadcast(new PusherPublicEvent('hello world'))->toOthers();



            // return back();
            $user = Auth::user();
            $messages = Message::with('user')->get();


            return Inertia::render('Charts/Index', compact('user', 'messages'));
        }

        public function fetchMessages()
        {
            // return Message::with('user')->get();
            $messages = Message::with('user')->get();
            return Inertia::render('Charts/Index', compact('messages'));
        }

        public function sendMessage(Request $request)
        {



            $user = Auth::user();
            $message = $user->messages()->create([
                'message' => $request->input('message')
            ]);

            broadcast(new MessageSent($user, $message))->toOthers();

            // return redirect()->route('chat-index');

            // $messages = Message::with('user')->get();
            // dd($messages);
            // return Inertia::render('Charts/Index', compact('messages'));

            // return ['status' => 'Message Sent!'];
        }
}


