<?php

namespace App\Http\Controllers;

use App\Models\Pledge;
use Illuminate\Http\Request;

class PledgeController extends Controller
{
    public function create(Request $request)
    {
        // Validate the request data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'quiz_question_id' => 'required|exists:quiz_questions,id',
            'answer' => 'required|string',
        ]);

        // Create a new pledge
        $pledge = Pledge::create([
            'user_id' => $request->input('user_id'),
            'quiz_question_id' => $request->input('quiz_question_id'),
            'answer' => $request->input('answer'),
        ]);

        // Return a success response
        return response()->json(['message' => 'Pledge created successfully'], 201);
    }

    public function update(Request $request, Pledge $pledge)
    {
        // Validate the request data
        $request->validate([
            'answer' => 'required|string',
        ]);

        // Update the pledge
        $pledge->update([
            'answer' => $request->input('answer'),
        ]);

        // Return a success response
        return response()->json(['message' => 'Pledge updated successfully'], 200);
    }

    public function show(Pledge $pledge)
    {
        // Return the pledge data
        return response()->json($pledge);
    }

    public function destroy(Pledge $pledge)
    {
        // Delete the pledge
        $pledge->delete();

        // Return a success response
        return response()->json(['message' => 'Pledge deleted successfully'], 200);
    }
}
