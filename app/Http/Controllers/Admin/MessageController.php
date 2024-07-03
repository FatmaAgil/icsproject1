<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->get();
        return view('admin.messages.index', compact('messages'));
    }

    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        return view('admin.messages.show', compact('message'));
    }

    public function edit($id)
    {
        $message = ContactMessage::findOrFail($id);
        return view('admin.messages.edit', compact('message'));
    }

    public function update(Request $request, $id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->reply_message = $request->input('reply_message');
        $message->save();

        return redirect()->route('admin.messages.index')->with('success', 'Reply sent successfully.');
    }

    public function destroy($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.messages.index')->with('success', 'Message deleted successfully.');
    }
}
