<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stade;

class stadeController extends Controller
{
    public function index(){
        $stade=Stade::all();
        return view('touriste.stade',compact('stade'));
    }
}
