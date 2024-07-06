<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\News;
use App\Models\CommunityPost;
use App\Models\ReportedContent;


class CommunityController extends Controller
{
    public function events()
    {
        $events = Event::all();
        return view('admin.community', compact('events'));
    }

    public function storeEvent(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date'
        ]);

        Event::create($request->all());

        return redirect()->back()->with('success', 'Event added successfully');
    }

    public function editEvent($id)
    {
        $event = Event::findOrFail($id);
        return response()->json($event);
    }

    public function updateEvent(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date'
        ]);

        $event = Event::findOrFail($id);
        $event->update($request->all());

        return redirect()->back()->with('success', 'Event updated successfully');
    }

    public function destroyEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->back()->with('success', 'Event deleted successfully');
    }
}
