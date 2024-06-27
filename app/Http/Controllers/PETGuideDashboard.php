<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PETGuideDashboard extends Controller
{
    public function index()
    {
        return view('PET');
    }
}
