<?php
// app/Http/Controllers/PointProgressController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PointsProgressController extends Controller
{
    public function index()
    {
        // Fetch points for the authenticated user
        $user = auth()->user(); // or use $request->user() if $request is injected
        $points = $user->points ?? null; // Assuming 'points' is a column in the users table

        return view('pointsProgress', compact('points'));
    }
}
