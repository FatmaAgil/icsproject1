<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Connection;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Message;

class PUConnectionController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        // Retrieve connections associated with the logged-in user
        $connections = Connection::where('plastic_form_id', $userId)
            ->with(['recyclingOrganization']) // Assuming 'plasticForm' relationship is not necessary here
            ->orderByDesc('created_at')
            ->get();

        // Log the connections retrieved
        Log::info('Connections retrieved for user ID:', ['user_id' => $userId, 'connections' => $connections->toArray()]);

        return view('Pl_userConnection', compact('connections'));
    }


        public function show($id)
        {
            try {
                // Fetch the connection including the related recycling organization and plastic form details
                $connection = Connection::with(['recyclingOrganization', 'plasticForm'])->findOrFail($id);

                // Return the connection details as JSON response
                return response()->json($connection);
            } catch (ModelNotFoundException $e) {
                // Handle case where connection is not found
                return response()->json(['error' => 'Connection not found'], 404);
            }
        }


    public function sendMessage(Request $request)
    {
        // Log the incoming request data
        Log::info('sendMessage request received:', ['request' => $request->all()]);

        // Validate the incoming request data
        try {
            $validatedData = $request->validate([
                'message' => 'required|string',
                'recyclingOrganizationId' => 'required|exists:recycling_organizations,id',
            ]);

            // Log the validated data
            Log::info('sendMessage request validated:', ['validatedData' => $validatedData]);

            // Create a new message instance
            $message = new Message();
            $message->message = $validatedData['message'];
            $message->user_id = auth()->id(); // Assuming the authenticated user is sending the message
            $message->recycling_organization_id = $validatedData['recyclingOrganizationId'];

            // Log the message details before saving
            Log::info('Message details before saving:', ['message' => $message->toArray()]);

            // Save the message
            $message->save();

            // Log the saved message
            Log::info('Message sent and saved:', ['message' => $message->toArray()]);

            // Return a success response
            return response()->json(['message' => 'Message sent successfully'], 200);
        } catch (\Exception $e) {
            // Log any exception that occurs
            Log::error('Error in sendMessage:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Message sending failed'], 500);
        }
    }
    private function getConnectionStatus($connection)
    {
        // Return the status directly from the connection model
        return ucfirst($connection->status); // Assuming status is stored in lowercase and you want to capitalize the first letter
    }
}
