<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PETGameController extends Controller
{
    public function index(){
        return view('game');
    }
}
