<?php

namespace App\Http\Controllers;

use App\Models\Plastic;
use App\Models\Pledge;
use App\Models\PvcQuestion;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PVCPlasticController extends Controller
{
    /**
     * Display a listing of the PVC plastics.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pvcQuestions = PvcQuestion::all();
        $pvcPlastics = Plastic::where('type', 'PVC')->paginate(10);
        return response()->view('PVCDisposalGuide', compact('pvcQuestions', 'pvcPlastics'));
    }

    /**
     * Display the specified PET plastic.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $pvcPlastic = Plastic::findOrFail($id);
        return view('PVCDisposalGuide', compact('pvcPlastic'));
    }

    /**
     * Show the form for creating a new PVC plastic.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('PVCDisposalGuide');
    }

    /**
     * Store a newly created PVC plastic in storage.
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

        $pvcPlastic = new Plastic([
            'type' => 'PVC',
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

        $pvcPlastic->save();

        return redirect()->route('PVCDisposalGuide')
                         ->with('success', 'PVC plastic created successfully.');
    }

    /**
     * Show the form for editing the specified PVC plastic.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pvcPlastic = Plastic::findOrFail($id);
        return response()->view('PVCDisposalGuide', compact('pvcPlastic'));
    }
    public function quizSubmit(Request $request)
    {
        $score = 0;
        foreach ($request->input('answers') as $questionId => $answer) {
            $question = PvcQuestion::find($questionId);
            if ($question->correct_answer == $answer) {
                $score++;
            }
        }
        return response()->json(['quiz_score' => $score]);
    }



    /**
     * Update the specified PVC plastic in storage.
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

        $pvcPlastic = Plastic::findOrFail($id);

        $images = json_decode($pvcPlastic->images, true) ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/images');
                $images[] = Storage::url($path);
            }
        }

        $pvcPlastic->title = $request->input('title');
        $pvcPlastic->introduction = $request->input('introduction');
        $pvcPlastic->environmental_impact = $request->input('environmental_impact');
        $pvcPlastic->brief_history = $request->input('brief_history');
        $pvcPlastic->video_links = $request->input('video_links');
        $pvcPlastic->recycling_info = $request->input('recycling_info');
        $pvcPlastic->physical_properties = $request->input('physical_properties');
        $pvcPlastic->uses = $request->input('uses');
        $pvcPlastic->images = json_encode($images);

        $pvcPlastic->save();

        return response()->view('PVCDisposalGuide')
                         ->with('success', 'PVC plastic updated successfully.');
    }

    /**
     * Remove the specified PVC plastic from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $pvcPlastic = Plastic::findOrFail($id);

        if (!empty($pvcPlastic->images)) {
            foreach (json_decode($pvcPlastic->images, true) as $image) {
                $imagePath = str_replace('/storage', 'public', $image);
                Storage::delete($imagePath);
            }
        }

        $pvcPlastic->delete();

        return redirect()->route('PVCDisposalGuide')
                         ->with('success', 'PVC plastic deleted successfully.');
    }

    /**
     * Show the form for creating a new quiz question.
     *
     * @return \Illuminate\Http\Response
     */
}
