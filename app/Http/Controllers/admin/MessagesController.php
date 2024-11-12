<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Message;

class MessagesController extends Controller
{
    public function index()
    {
        if(!auth()->user()->can('messages.view_all')) {
            abort(403);
        }
        $messages = Message::with(['from', 'to'])
                    ->select('id', 'message_from', 'message_to', 'message')->get();

        return view('admin.messages.index', compact('messages'));
    }
}
