<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlasticForm;
class PlasticFormController extends Controller
{
    public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'phone_number' => 'required|string|max:255',
        'plastic_type' => 'required|string|max:255',
        'quantity' => 'required|numeric',
        'condition' => 'required|string|max:255',
        'collection_date' => 'required|date',
        'collection_time' => 'required|date_format:H:i',
        'instructions' => 'nullable|string',
        'payment_method' => 'required|string|max:255',
        'bank_details' => 'nullable|string|max:255',
        'comments' => 'nullable|string',
    ]);

    // Create a new PlasticForm record
    PlasticForm::create($validatedData);

    // Redirect to the same page with a success message
    return redirect()->route('landingUser')->with('success', 'Form submitted successfully!');
}
}
