<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Connection; // Import the Connection model
use Illuminate\Support\Facades\Mail;
use App\Mail\ConnectionMessage;
class PUConnectionController extends Controller
{
    public function index()
    {
        // Example index method to display plastic user's connection history
        $userId = auth()->id(); // Assuming authentication and fetching current user ID
        $connections = Connection::where('plastic_form_id', $userId)
            ->with(['recyclingOrganization'])
            ->orderByDesc('created_at')
            ->get();

        return view('Pl_userConnection', compact('connections'));
    }
    public function show($id)
    {
        // Fetch connection details by ID
        $connection = Connection::with('recyclingOrganization')->find($id);

        // Check if connection exists
        if (!$connection) {
            // Handle case where connection is not found, perhaps redirect or show error
            return redirect()->back()->with('error', 'Connection not found.');
        }

        // Return view with connection details
        return view('connection.show', compact('connection'));
    }
        public function sendMessage(Request $request)
    {
        $connectionId = $request->input('connection_id'); // Assuming you have a way to get the connection ID
        $message = $request->input('message');

        // Retrieve connection details
        $connection = Connection::find($connectionId);
        $orgEmail = $connection->recyclingOrganization->email;

        // Send email
        Mail::to($orgEmail)->send(new ConnectionMessage($message));

        // Optionally, you can redirect back with a success message
        return redirect()->back()->with('message_sent', 'Message sent successfully!');
    }
}
