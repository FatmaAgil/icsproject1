<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use App\Models\Reply;
class MessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->get();
        return view('admin.messages', compact('messages'));
    }

    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        return view('admin.messages.index', compact('message'));
    }



        public function reply(Request $request, $id)
        {
            $message = ContactMessage::findOrFail($id);

            $reply = new Reply();
            $reply->contact_message_id = $message->id;
            $reply->reply = $request->input('reply');
            $reply->save();

            return redirect()->route('admin.messages.index')->with('success', 'Reply sent successfully.');
        }
        public function latestMessages()
        {
            $messages = ContactMessage::latest()->take(4)->get();
            return view('admin.partials.latest-messages', compact('messages'));
        }
    }






