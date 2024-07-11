<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plastic;
use App\Models\PpQuestion;
use App\Models\Pledge;
use Illuminate\Support\Facades\Storage;

class PpPlasticController extends Controller
{
    /**
     * Display a listing of the PET plastics.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ppQuestions = PpQuestion::all();
        $ppPlastics = Plastic::where('type', 'PP')->paginate(10);
        return response()->view('PPDisposalGuide', compact('ppQuestions', 'ppPlastics'));
    }

    /**
     * Display the specified PP plastic.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $ppPlastic = Plastic::findOrFail($id);
        return view('PPDisposalGuide', compact('ppPlastic'));
    }

    /**
     * Show the form for creating a new PP plastic.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('PPDisposalGuide');
    }

    /**
     * Store a newly created PP plastic in storage.
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

        $ppPlastic = new Plastic([
            'type' => 'PP',
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

        $ppPlastic->save();

        return redirect()->route('PPDisposalGuide')
                         ->with('success', 'PP plastic created successfully.');
    }

    /**
     * Show the form for editing the specified PP plastic.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ppPlastic = Plastic::findOrFail($id);
        return response()->view('PPDisposalGuide', compact('ppPlastic'));
    }
    public function quizSubmit(Request $request)
    {
        $score = 0;
        foreach ($request->input('answers') as $questionId => $answer) {
            $question = PpQuestion::find($questionId);
            if ($question->correct_answer == $answer) {
                $score++;
            }
        }
        return response()->json(['quiz_score' => $score]);
    }



    /**
     * Update the specified PP plastic in storage.
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

        $ppPlastic = Plastic::findOrFail($id);

        $images = json_decode($ppPlastic->images, true) ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/images');
                $images[] = Storage::url($path);
            }
        }

        $ppPlastic->title = $request->input('title');
        $ppPlastic->introduction = $request->input('introduction');
        $ppPlastic->environmental_impact = $request->input('environmental_impact');
        $ppPlastic->brief_history = $request->input('brief_history');
        $ppPlastic->video_links = $request->input('video_links');
        $ppPlastic->recycling_info = $request->input('recycling_info');
        $ppPlastic->physical_properties = $request->input('physical_properties');
        $ppPlastic->uses = $request->input('uses');
        $ppPlastic->images = json_encode($images);

        $ppPlastic->save();

        return response()->view('PETDisposalGuide')
                         ->with('success', 'PET plastic updated successfully.');
    }

    /**
     * Remove the specified PP plastic from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $ppPlastic = Plastic::findOrFail($id);

        if (!empty($ppPlastic->images)) {
            foreach (json_decode($ppPlastic->images, true) as $image) {
                $imagePath = str_replace('/storage', 'public', $image);
                Storage::delete($imagePath);
            }
        }

        $ppPlastic->delete();

        return redirect()->route('PPDisposalGuide')
                         ->with('success', 'PP plastic deleted successfully.');
    }

    /**
     * Show the form for creating a new quiz question.
     *
     * @return \Illuminate\Http\Response
     */


}

