<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Event;

class CommunityController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10); // Fetch latest news with pagination
        $events = Event::latest()->paginate(10); // Fetch latest events with pagination

        return view('Community', compact('news', 'events'));
    }
}
