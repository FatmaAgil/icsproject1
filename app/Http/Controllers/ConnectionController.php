<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Connection;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConnectionMessage;
class ConnectionController extends Controller
{
    public function index()
    {
        // Fetch connections from the database, adjust as per your model structure
        $connections = Connection::all(); // Example to fetch all connections, adjust as per your needs

        // Pass data to the view
        return view('orgConnection', ['connections' => $connections]);
    }
    public function destroy($id)
    {
        $connection = Connection::findOrFail($id);
        $connection->delete();

        return redirect()->route('connections.index')->with('success', 'Connection deleted successfully.');
    }
    public function update(Request $request, Connection $connection)
    {
        $connection->status = $request->input('status');
        $connection->save();

        return redirect()->route('connections.index')->with('success', 'Connection status updated successfully.');
    }
    // Method to handle storing a new connection
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            // Add validation rules as per your form fields
            'plastic_user_id' => 'required|integer',
            'recycling_org_id' => 'required|integer',
            'details' => 'nullable|string',
            // Add more fields as per your form requirements
        ]);

        // Create a new connection record
        $connection = Connection::create($validatedData);
        return view('orgConnection', ['connection' => $connection]);
        // Optionally, you can return a response or redirect

    }

    // Method to handle showing a specific connection
    public function show($id)
    {
        // Fetch the connection with the given $id
        $connection = Connection::findOrFail($id);

        // Return a view to show the connection details
        return view('orgConnection', ['connection' => $connection]);
    }
    public function orgConnections()
    {
        $connections = Connection::with('plasticForm.user')->get();
        return view('orgConnections', compact('connections'));
    }
    public function sendMessage($id)
    {
        $plasticUserId = $id; // ID of the plastic user you want to email

        // Fetch details of the connection or plastic user as needed
        $connection = Connection::where('recycling_organization_id', auth()->id())
            ->whereHas('plasticForm', function ($query) use ($plasticUserId) {
                $query->where('user_id', $plasticUserId);
            })
            ->first();

        if (!$connection) {
            return redirect()->back()->with('error', 'Connection not found.');
        }

        // Assuming you have a mail class like ConnectionMessage to send the email
        $userEmail = $connection->plasticForm->user->email; // Fetch plastic user's email
        $userName = $connection->plasticForm->user->name; // Fetch plastic user's name

        // Send email
        Mail::to($userEmail)->send(new ConnectionMessage($userName));

        return redirect()->back()->with('success', 'Email sent successfully.');
    }

    /**
     * Send the message to the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */

}
