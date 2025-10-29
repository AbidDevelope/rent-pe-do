<?php

namespace App\Http\Controllers\Web\Messages;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::orderBy('id', 'DESC')->get();
        return view('message.index',compact('messages'));
    }
}
