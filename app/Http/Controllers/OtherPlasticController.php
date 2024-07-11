<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plastic;
use App\Models\OtherQuestion;
use App\Models\OtherQuestions;
use App\Models\Pledge;
use Illuminate\Support\Facades\Storage;

class OtherPlasticController extends Controller
{
    /**
     * Display a listing of the Other plastics.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $otherQuestions = OtherQuestion::all();
        $otherPlastics = Plastic::where('type', 'Other')->paginate(10);
        return response()->view('OtherDisposalGuide', compact('otherQuestions', 'otherPlastics'));
    }

    /**
     * Display the specified Other plastic.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $otherPlastic = Plastic::findOrFail($id);
        return view('OtherDisposalGuide', compact('otherPlastic'));
    }

    /**
     * Show the form for creating a new Other plastic.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('OtherDisposalGuide');
    }

    /**
     * Store a newly created Other plastic in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'introduction' => 'required|string',
            'environmental_impact' => 'required|string',
            'brief_history' => 'nullable|string',
            'video_links' => 'nullable|string',
            'recycling_info' => 'nullable|string',
            'physical_properties' => 'nullable|string',
            'uses' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/images');
                $images[] = Storage::url($path);
            }
        }

        $otherPlastic = new Plastic([
            'type' => 'Other',
            'title' => $request->input('title'),
            'introduction' => $request->input('introduction'),
            'environmental_impact' => $request->input('environmental_impact'),
            'brief_history' => $request->input('brief_history'),
            'video_links' => $request->input('video_links'),
            'recycling_info' => $request->input('recycling_info'),
            'physical_properties' => $request->input('physical_properties'),
            'uses' => $request->input('uses'),
            'images' => json_encode($images),
        ]);

        $otherPlastic->save();

        return redirect()->route('OtherDisposalGuide')
                         ->with('success', 'Other plastic created successfully.');
    }

    /**
     * Show the form for editing the specified Other plastic.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $otherPlastic = Plastic::findOrFail($id);
        return response()->view('OtherDisposalGuide', compact('otherPlastic'));
    }
    public function quizSubmit(Request $request)
    {
        $score = 0;
        foreach ($request->input('answers') as $questionId => $answer) {
            $question = OtherQuestion::find($questionId);
            if ($question->correct_answer == $answer) {
                $score++;
            }
        }
        return response()->json(['quiz_score' => $score]);
    }



    /**
     * Update the specified Other plastic in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): \Illuminate\Http\Response
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'introduction' => 'required|string',
            'environmental_impact' => 'required|string',
            'brief_history' => 'nullable|string',
            'video_links' => 'nullable|string',
            'recycling_info' => 'nullable|string',
            'physical_properties' => 'nullable|string',
            'uses' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $otherPlastic = Plastic::findOrFail($id);

        $images = json_decode($otherPlastic->images, true) ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/images');
                $images[] = Storage::url($path);
            }
        }

        $otherPlastic->title = $request->input('title');
        $otherPlastic->introduction = $request->input('introduction');
        $otherPlastic->environmental_impact = $request->input('environmental_impact');
        $otherPlastic->brief_history = $request->input('brief_history');
        $otherPlastic->video_links = $request->input('video_links');
        $otherPlastic->recycling_info = $request->input('recycling_info');
        $otherPlastic->physical_properties = $request->input('physical_properties');
        $otherPlastic->uses = $request->input('uses');
        $otherPlastic->images = json_encode($images);

        $otherPlastic->save();

        return response()->view('OtherDisposalGuide')
                         ->with('success', 'Other plastic updated successfully.');
    }

    /**
     * Remove the specified Other plastic from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $otherPlastic = Plastic::findOrFail($id);

        if (!empty($otherPlastic->images)) {
            foreach (json_decode($otherPlastic->images, true) as $image) {
                $imagePath = str_replace('/storage', 'public', $image);
                Storage::delete($imagePath);
            }
        }

        $otherPlastic->delete();

        return redirect()->route('OtherDisposalGuide')
                         ->with('success', 'Other plastic deleted successfully.');
    }

    /**
     * Show the form for creating a new quiz question.
     *
     * @return \Illuminate\Http\Response
     */

}
