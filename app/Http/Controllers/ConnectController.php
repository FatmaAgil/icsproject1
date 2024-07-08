<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        // For simplicity, we are returning a static list of organizations.
        // Replace this with actual data fetching logic.
        $organizations = [
            ['name' => 'Recycling Org 1', 'latitude' => $latitude + 0.01, 'longitude' => $longitude + 0.01],
            ['name' => 'Recycling Org 2', 'latitude' => $latitude - 0.01, 'longitude' => $longitude - 0.01],
        ];

        return response()->json($organizations);
    }
}
