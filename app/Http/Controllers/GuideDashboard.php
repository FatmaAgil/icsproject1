<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuideDashboard extends Controller
{
    public function index (){
        return view('guide');
    }
}
