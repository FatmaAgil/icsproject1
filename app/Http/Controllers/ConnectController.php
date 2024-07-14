<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecyclingOrganization;
use App\Mail\OrganizationConnection;
use App\Models\PlasticForm;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\OrganizationConnectedNotification;
use App\Mail\PlasticUserConnectedNotification;
use App\Models\Connection;
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

        // Haversine formula to find recycling organizations within the radius
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

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $organization = RecyclingOrganization::where('name', $name)->first();

        if (!$organization) {
            return response()->json(['success' => false, 'message' => 'Organization not found'], 404);
        }

        $userName = $request->input('name');
        $userPhone = $request->input('phone');
        $userEmail = $request->input('email');

        // Send email to the organization
        Mail::send('emails.organization_connected', [
            'userName' => $userName,
            'userPhone' => $userPhone,
            'userEmail' => $userEmail
        ], function ($message) use ($organization) {
            $message->to($organization->email)
                    ->subject('New Plastic User Connection');
        });

        // Send email to the plastic user
        Mail::send('emails.plastic_user_connected', [
            'organizationName' => $organization->name,
            'organizationEmail' => $organization->email
        ], function ($message) use ($userEmail) {
            $message->to($userEmail)
                    ->subject('You are connected to a Recycling Organization');
        });

        return response()->json(['success' => true, 'message' => 'Emails sent successfully']);
    }
}
