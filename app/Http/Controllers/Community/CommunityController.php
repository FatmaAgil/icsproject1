<?php

// app/Http/Controllers/Community/CommunityController.php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Community;
use App\Models\News;
use App\Models\Event;

class CommunityController extends Controller
{
    /**
     * Display a listing of the communities.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::latest()->paginate(10); // Fetch latest news with pagination
        $events = Event::latest()->paginate(10); // Fetch latest events with pagination
        $communities = Community::latest()->paginate(10); // Fetch latest communities with pagination

        return view('Community', compact('news', 'events', 'communities'));
    }

    /**
     * Show the form for creating a new community.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('communities.create');
    }

    /**
     * Store a newly created community in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $community = Community::create($request->all());
        return redirect()->route('communities.index')->with('success', 'Community created successfully!');
    }

    /**
     * Display the specified community.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function show(Community $community)
    {
        return view('communities.show', compact('community'));
    }

    /**
     * Show the form for editing the specified community.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function edit(Community $community)
    {
        return view('communities.edit', compact('community'));
    }

    /**
     * Update the specified community in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Community $community)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $community->update($request->all());
        return redirect()->route('communities.index')->with('success', 'Community updated successfully!');
    }

    /**
     * Remove the specified community from storage.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function destroy(Community $community)
    {
        $community->delete();
        return redirect()->route('communities.index')->with('success', 'Community deleted successfully!');
    }
}
