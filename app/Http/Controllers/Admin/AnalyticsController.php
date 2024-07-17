<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnalyticsController extends Controller
{
    public function showAnalytics()
    {
        // Get counts of each user role
        $userTypes = User::select('role', DB::raw('count(*) as count'))
                         ->groupBy('role')
                         ->get();

        // Query to get count of registrations per day for the last 7 days
        $registrations = User::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
                             ->where('created_at', '>=', Carbon::now()->subDays(7))
                             ->groupBy('date')
                             ->orderBy('date')
                             ->get();

        return view('admin.analytics', compact('userTypes', 'registrations'));
    }
}
