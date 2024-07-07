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
    public function index()
    {
        $events = Event::all();
        $news = News::all();
        return view('admin.community', compact('events', 'news'));
    }

    public function create()
    {
        return view('admin.create_community');
    }

    public function store(Request $request)
    {
        if ($request->type == 'event') {
            Event::create($request->all());
        } else if ($request->type == 'news') {
            News::create($request->all());
        }
        return redirect()->route('communities.index');
    }

    public function edit($type, $id)
    {
        if ($type == 'event') {
            $item = Event::findOrFail($id);
        } else if ($type == 'news') {
            $item = News::findOrFail($id);
        }
        return view('admin.edit_community', compact('item', 'type'));
    }

    public function update(Request $request, $type, $id)
    {
        if ($type == 'event') {
            $item = Event::findOrFail($id);
            $item->update($request->all());
        } else if ($type == 'news') {
            $item = News::findOrFail($id);
            $item->update($request->all());
        }
        return redirect()->route('communities.index');
    }

    public function destroy($type, $id)
    {
        if ($type == 'event') {
            Event::destroy($id);
        } else if ($type == 'news') {
            News::destroy($id);
        }
        return redirect()->route('communities.index');
    }
}
