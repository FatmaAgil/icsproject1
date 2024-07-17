<?php

// app/Http/Controllers/EventAttendanceController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EventAttendanceController extends Controller
{
    public function attendEvent(Request $request)
{
    Log::info('Attempting to attend event');
    try {
        $user = Auth::user();
        Log::info('User ID: ' . $user->id);

        $eventId = $request->input('event_id');
        Log::info('Event ID: ' . $eventId);

        $event = Event::findOrFail($eventId);
        Log::info('Event found: ' . $event->name);

        // Check if user has already attended the event
        if (!$user->attendedEvents()->where('event_id', $eventId)->wherePivot('attended', true)->exists()) {
            Log::info('User has not attended the event yet');

            // Attach the event and mark it as attended
            $user->attendedEvents()->attach($eventId, ['attended' => true]);
            $user->points += $event->points;
            if ($user instanceof User) {
                $user->save();
            } else {
                Log::error('Invalid user object');
                return response()->json(['success' => false, 'message' => 'Invalid user object.']);
            }

            Log::info('Points added to user');

            return response()->json(['success' => true, 'message' => 'You have successfully attended the event and earned points!']);
        }

        Log::info('User has already attended the event');
        return response()->json(['success' => false, 'message' => 'You have already attended this event.']);
    } catch (\Exception $e) {
        Log::error('Error attending event: ' . $e->getMessage());
        return response()->json(['success' => false, 'message' => 'An error occurred while processing your request.']);
    }
}
}
