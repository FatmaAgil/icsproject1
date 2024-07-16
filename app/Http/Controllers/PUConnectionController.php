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

    public function sendMessage($id)
{
    $orgId = $id; // ID of the recycling organization you want to email

    // Fetch details of the connection or organization as needed
    $connection = Connection::where('plastic_form_id', auth()->id())
        ->where('recycling_organization_id', $orgId)
        ->first();

    if (!$connection) {
        return redirect()->back()->with('error', 'Connection not found.');
    }

    // Assuming you have a mail class like ConnectionMessage to send the email
    $orgEmail = $connection->recyclingOrganization->email; // Fetch organization's email
    $orgName = $connection->recyclingOrganization->name; // Fetch organization's name

    // Send email
    Mail::to($orgEmail)->send(new ConnectionMessage($orgName));

    return redirect()->back()->with('success', 'Email sent successfully.');
}
}
