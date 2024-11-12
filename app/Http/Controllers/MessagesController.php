<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MessagesController extends Controller
{
    public function getOwnMessages()
    {
        $authId = auth()->id();
        $messages = Message::where('message_from', $authId)
                    ->orWhere('message_to', $authId)
                    ->get();

        return view('messages.own', compact('messages'));
    }

    public function messageATeacher(User $teacher)
    {
        if(!auth()->user()->can('messages.create')) {
            abort(403);
        }

        $this->authorize('createMessage', $teacher);

        return view('messages.create', compact('teacher'));
    }

    public function storeAMessageToTeacher(Request $request, User $teacher)
    {
        if(!auth()->user()->can('messages.create')) {
            abort(403);
        }

        $request->validate(['message' => ['required', 'string']]);

        auth()->user()->messages()->create([
            'message' => $request->message,
            'message_to' => $teacher->id
        ]);

        return redirect()->route('own-messages.index');
    }
}
