<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuideQuiz extends Controller
{
    public function index(){
        return view('quiz');
    }
}
