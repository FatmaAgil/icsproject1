<?php

namespace App\Http\Controllers;

use App\Models\Plastic;
use App\Models\HDPEQuiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HDPEPlasticController extends Controller
{
    /**
     * Display a listing of the HDPE plastics.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hdpeQuizzes = HDPEQuiz::all();
        $hdpePlastics = Plastic::where('type', 'HDPE')->paginate(10);
        return response()->view('HDPEDisposalGuide', compact('hdpeQuizzes', 'hdpePlastics'));
    }

    /**
     * Display the specified HDPE plastic.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hdpePlastic = Plastic::findOrFail($id);
        return response()->view('HDPEDisposalGuide', compact('hdpePlastic'));
    }

    /**
     * Show the form for creating a new HDPE plastic.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('HDPEDisposalGuide');
    }

    /**
     * Store a newly created HDPE plastic in storage.
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

        $hdpePlastic = new Plastic([
            'type' => 'HDPE',
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

        $hdpePlastic->save();

        return redirect()->route('HDPEDisposalGuide')
                         ->with('success', 'HDPE plastic created successfully.');
    }

    /**
     * Show the form for editing the specified HDPE plastic.
     *
     * @param  int  $id
     * @return \Illuminate\HTTP\Response
     */
    public function edit($id)
    {
        $hdpePlastic = Plastic::findOrFail($id);
        return response()->view('HDPEDisposalGuide', compact('hdpePlastic'));
    }
    public function quiz(Request $request)
    {
        $score = 0;
        foreach ($request->input('answers') as $questionId => $answer) {
            $question = HDPEQuiz::find($questionId);
            if ($question->correct_answer == $answer) {
                $score++;
            }
        }
        return response()->json(['quiz_score' => $score]);
    }

    /**
     * Update the specified HDPE plastic in storage.
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

        $hdpePlastic = Plastic::findOrFail($id);

        $images = json_decode($hdpePlastic->images, true) ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/images');
                $images[] = Storage::url($path);
            }
        }

        $hdpePlastic->title = $request->input('title');
        $hdpePlastic->introduction = $request->input('introduction');
        $hdpePlastic->environmental_impact = $request->input('environmental_impact');
        $hdpePlastic->brief_history = $request->input('brief_history');
        $hdpePlastic->video_links = $request->input('video_links');
        $hdpePlastic->recycling_info = $request->input('recycling_info');
        $hdpePlastic->physical_properties = $request->input('physical_properties');
        $hdpePlastic->uses = $request->input('uses');
        $hdpePlastic->images = json_encode($images);

        $hdpePlastic->save();

        return response()->route('HDPEDisposalGuide')
                         ->with('success', 'HDPE plastic updated successfully.');
    }

    /**
     * Remove the specified HDPE plastic from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id):\Illuminate\Http\RedirectResponse
    {
        $hdpePlastic = Plastic::findOrFail($id);

        if (!empty($hdpePlastic->images)) {
            foreach (json_decode($hdpePlastic->images, true) as $image) {
                $imagePath = str_replace('/storage', 'public', $image);
                Storage::delete($imagePath);
            }
        }

        $hdpePlastic->delete();

        return redirect()->route('HDPEDisposalGuide')
                         ->with('success', 'HDPE plastic deleted successfully.');
    }

    /**
     * Handle the quiz submission.
     *
     * @return \Illuminate\Http\Response
     */

}
