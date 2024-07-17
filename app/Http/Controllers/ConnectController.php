<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecyclingOrganization;
use Illuminate\Support\Facades\Mail;
use App\Models\PlasticForm;
use App\Models\Connection;
use Illuminate\Support\Facades\Log;

use App\Mail\PlasticConnectionEmail;
class ConnectController extends Controller
{
    public function showMap()
    {
        return view('connect');
    }

    public function getRecyclingOrganizations(Request $request)
    {
        $latitude = $request->query('lat');
        $longitude = $request->query('lon');
        $radius = 10; // Radius in kilometers

        $organizations = RecyclingOrganization::selectRaw("
            id, name, description, requirements, latitude, longitude,
            (6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distance
        ", [$latitude, $longitude, $latitude])
            ->having('distance', '<=', $radius)
            ->orderBy('distance')
            ->get();

        return response()->json($organizations);
    }

    public function connectToOrganization(Request $request, $name)
    {
        Log::info('Connect request received', $request->all());

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'plastic_type' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'condition' => 'required|string|max:255',
            'collection_date' => 'required|date',
            'collection_time' => 'required|string|max:255',
            'instructions' => 'nullable|string',
            'payment_method' => 'required|string|max:255',
            'bank_details' => 'nullable|string',
            'comments' => 'nullable|string',
        ]);
        $validated['phone_number'] = $validated['phone'];
        unset($validated['phone']); // Optional: remove 'phone' key if it's not needed

        $organization = RecyclingOrganization::where('name', $name)->first();

        if (!$organization) {
            Log::error('Organization not found', ['name' => $name]);
            return response()->json(['success' => false, 'message' => 'Organization not found'], 404);
        }

        // Save plastic form details
        $plasticForm = PlasticForm::create($validated);

        // Save connection details
        $connection = Connection::create([
            'plastic_form_id' => $plasticForm->id,
            'recycling_organization_id' => $organization->id,
            'status' => 'Pending',
        ]);

        // Send email to the organization
        Mail::send('emails.organization_connected', [
            'userName' => $plasticForm->name,
            'userPhone' => $plasticForm->phone,
            'userEmail' => $plasticForm->email,
            'plasticType' => $plasticForm->plastic_type,
            'quantity' => $plasticForm->quantity,
            'condition' => $plasticForm->condition,
            'collectionDate' => $plasticForm->collection_date,
            'collectionTime' => $plasticForm->collection_time,
            'instructions' => $plasticForm->instructions,
            'paymentMethod' => $plasticForm->payment_method,
            'bankDetails' => $plasticForm->bank_details,
            'comments' => $plasticForm->comments,
        ], function ($message) use ($organization) {
            $message->to($organization->email)
                    ->subject('New Plastic User Connection');
        });

        // Send email to the plastic user
        Mail::send('emails.plastic_user_connected', [
            'organizationName' => $organization->name,
            'organizationEmail' => $organization->email,
            'organizationPhone' => $organization->phone,
            'organizationAddress' => $organization->address,
        ], function ($message) use ($plasticForm) {
            $message->to($plasticForm->email)
                    ->subject('You are connected to a Recycling Organization');
        });

        Log::info('Connection established and emails sent successfully');
        return response()->json(['success' => true, 'message' => 'Connection established and emails sent successfully']);
    }
}
