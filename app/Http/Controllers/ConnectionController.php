<?php

namespace App\Http\Controllers;

use App\Models\Connection;
use App\Models\Message;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    public function index()
    {
        $connections = Connection::with(['plasticForm.user', 'recyclingOrganization'])->get();
        return view('orgConnection', compact('connections'));
    }

    public function update(Request $request, $id)
    {
        $connection = Connection::findOrFail($id);
        $connection->status = $request->status;
        $connection->save();

        return redirect()->back()->with('success', 'Connection status updated successfully.');
    }

    public function destroy($id)
    {
        $connection = Connection::findOrFail($id);
        $connection->delete();

        return redirect()->back()->with('success', 'Connection cancelled successfully.');
    }

    public function show($id)
    {
        $connection = Connection::with(['plasticForm.user', 'recyclingOrganization'])->findOrFail($id);
        return response()->json($connection);
    }

    public function message($id)
    {
        $connection = Connection::with(['plasticForm.user', 'recyclingOrganization'])->findOrFail($id);
        return view('orgConnection', compact('connection'));
    }

    public function sendMessage(Request $request, $id)
    {
        $connection = Connection::findOrFail($id);
        $message = new Message();
        $message->connection_id = $connection->id;
        $message->sender_id = auth()->user()->id;
        $message->recipient_id = $request->recipient_id;
        $message->content = $request->message;
        $message->save();

        return redirect()->back()->with('success', 'Message sent successfully.');
    }

    public function updateStatus(Request $request, $id)
    {
        $connection = Connection::findOrFail($id);
        $connection->status = $request->status;
        $connection->save();

        return response()->json(['message' => 'Connection status updated successfully.']);
    }
}
