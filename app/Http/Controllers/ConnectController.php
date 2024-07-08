<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecyclingOrganization;
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
}
