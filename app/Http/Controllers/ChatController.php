<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Events\Messages;
use App\Notifications\NewMessage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;

class ChatController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function chat(){

        return view('chat.chat');
    }

//    public function send(Request $request)
//    {
//
//        $user = User::find(Auth::id());
//        event(new Messages($request->message, $user));
//    }
    public function send(Request $request)
    {
        $message = $request->message;
        $user = User::find(Auth::id());

        $comment = new Comments();
        $comment->comment = $message;
        $comment->from_id = $user->id;
        $comment->to_id = 1;
        $comment->save();
        $time = $comment->created_at;
        event(new Messages($message, $user, $time));

        $user = Auth::user();

        $user->notify(new NewMessage($message));

    }
}
