<?php

namespace App\Http\Controllers;
use App\Models\Plastic;
use App\Models\QuizQuest;
use App\Models\Pledge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\storage;

class LDPEPlasticController extends Controller
{
      /**
     * Display a listing of the  plastics.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizQuest = QuizQuest::all();
        $ldpePlastics = Plastic::where('type', 'LDPE')->paginate(10);
        return response()->view('LDPEDisposalGuide', compact('quizQuest', 'ldpePlastics'));
    }
     /**
     * Display the|| specified LDPE plastic.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $ldpePlastic = Plastic::findOrFail($id);
        return view('LDPEDisposalGuide', compact('ldpePlastic'));
    }
    /**
     * Show the form for creating a new PET plastic.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('LDPEDisposalGuide');
    }
     /**
     * Store a newly created LDPE plastic in storage.
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

        $ldpePlastic = new Plastic([
            'type' => 'LDPE',
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

        $ldpePlastic->save();

        return redirect()->route('LDPEDisposalGuide')
                         ->with('success', 'LDPE plastic created successfully.');
    }
     /**
     * Show the form for editing the specified LDPE plastic.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ldpePlastic = Plastic::findOrFail($id);
        return response()->view('LDPEDisposalGuide', compact('ldpePlastic'));
    }
    public function quizSubmit(Request $request)
    {
        $score = 0;
        foreach ($request->input('answers') as $questionId => $answer) {
            $question = QuizQuest::find($questionId);
            if ($question->correct_answer == $answer) {
                $score++;
            }
        }
        return response()->json(['quiz_score' => $score]);
    }
   /**
     * Update the specified LDPE plastic in storage.
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

        $ldpePlastic = Plastic::findOrFail($id);

        $images = json_decode($ldpePlastic->images, true) ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/images');
                $images[] = Storage::url($path);
            }
        }

        $ldpePlastic->title = $request->input('title');
        $ldpePlastic->introduction = $request->input('introduction');
        $ldpePlastic->environmental_impact = $request->input('environmental_impact');
        $ldpePlastic->brief_history = $request->input('brief_history');
        $ldpePlastic->video_links = $request->input('video_links');
        $ldpePlastic->recycling_info = $request->input('recycling_info');
        $ldpePlastic->physical_properties = $request->input('physical_properties');
        $ldpePlastic->uses = $request->input('uses');
        $ldpePlastic->images = json_encode($images);

        $ldpePlastic->save();

        return response()->view('LDPEDisposalGuide')
                         ->with('success', 'LDPE plastic updated successfully.');
    }

    /**
     * Remove the specified LDPE plastic from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $ldpePlastic = Plastic::findOrFail($id);

        if (!empty($ldpePlastic->images)) {
            foreach (json_decode($ldpePlastic->images, true) as $image) {
                $imagePath = str_replace('/storage', 'public', $image);
                Storage::delete($imagePath);
            }
        }

        $ldpePlastic->delete();

        return redirect()->route('LDPEDisposalGuide')
                         ->with('success', 'LDPE plastic deleted successfully.');
    }

    /**
     * Show the form for creating a new quiz question.
     *
     * @return \Illuminate\Http\Response
     */


}
