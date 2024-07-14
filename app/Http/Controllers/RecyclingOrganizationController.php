<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecyclingOrganization;

class RecyclingOrganizationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'email' => 'required|email|unique:recycling_organizations,email', // Validation for email

        ]);

        RecyclingOrganization::create($validated);

        return redirect()->back()->with('success', 'Recycling organization registered successfully!');
    }
}
