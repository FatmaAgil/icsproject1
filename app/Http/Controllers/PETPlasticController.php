<?php

namespace App\Http\Controllers;

use App\Models\Plastic;
use App\Models\QuizQuestion;
use App\Models\Pledge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PETPlasticController extends Controller
{
    /**
     * Display a listing of the PET plastics.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizQuestions = QuizQuestion::all();
        $petPlastics = Plastic::where('type', 'PET')->paginate(10);
        return view('PETDisposalGuide', compact('quizQuestions', 'petPlastics'));
    }

    /**
     * Display the specified PET plastic.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $petPlastic = Plastic::findOrFail($id);
        return view('PETDisposalGuide', compact('petPlastic'));
    }

    /**
     * Show the form for creating a new PET plastic.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('PETDisposalGuide');
    }

    /**
     * Store a newly created PET plastic in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        $petPlastic = new Plastic([
            'type' => 'PET',
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

        $petPlastic->save();

        return redirect()->route('PETDisposalGuide')
                         ->with('success', 'PET plastic created successfully.');
    }

    /**
     * Show the form for editing the specified PET plastic.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $petPlastic = Plastic::findOrFail($id);
        return view('PETDisposalGuide', compact('petPlastic'));
    }
    public function quizSubmit(Request $request)
    {
        $score = 0;
        foreach ($request->input('answers') as $questionId => $answer) {
            $question = QuizQuestion::find($questionId);
            if ($question->correct_answer == $answer) {
                $score++;
            }
        }
        return response()->json(['quiz_score' => $score]);
    }


    public function takePledge(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        $pledge = new Pledge([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ]);

        $pledge->save();

        return redirect()->route('PETDisposalGuide')
                         ->with('success', 'Pledge taken successfully.');
    }

    /**
     * Update the specified PET plastic in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

        $petPlastic = Plastic::findOrFail($id);

        $images = json_decode($petPlastic->images, true) ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/images');
                $images[] = Storage::url($path);
            }
        }

        $petPlastic->title = $request->input('title');
        $petPlastic->introduction = $request->input('introduction');
        $petPlastic->environmental_impact = $request->input('environmental_impact');
        $petPlastic->brief_history = $request->input('brief_history');
        $petPlastic->video_links = $request->input('video_links');
        $petPlastic->recycling_info = $request->input('recycling_info');
        $petPlastic->physical_properties = $request->input('physical_properties');
        $petPlastic->uses = $request->input('uses');
        $petPlastic->images = json_encode($images);

        $petPlastic->save();

        return redirect()->route('PETDisposalGuide')
                         ->with('success', 'PET plastic updated successfully.');
    }

    /**
     * Remove the specified PET plastic from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petPlastic = Plastic::findOrFail($id);

        if (!empty($petPlastic->images)) {
            foreach (json_decode($petPlastic->images, true) as $image) {
                $imagePath = str_replace('/storage', 'public', $image);
                Storage::delete($imagePath);
            }
        }

        $petPlastic->delete();

        return redirect()->route('PETDisposalGuide')
                         ->with('success', 'PET plastic deleted successfully.');
    }

    /**
     * Show the form for creating a new quiz question.
     *
     * @return \Illuminate\Http\Response
     */


}
