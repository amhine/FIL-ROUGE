<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MatcheController extends Controller
{
    public function index()
    {
        $json = Storage::get('worldcup.json');
        $data = json_decode($json, true);
        
        $tournament = $data['tournament'];
        $host = $data['host'];
        $dates = $data['dates'];
        $matches = $data['matches'];

        return view('touriste.match', compact('tournament', 'host', 'dates', 'matches'));
    }

    public function show($id)
    {
        $json = Storage::get('worldcup.json');
        $data = json_decode($json, true);
        $match = collect($data['matches'])->firstWhere('id', $id);
        $tournament = $data['tournament'];
    return view('touriste.match_details', compact('tournament', 'match'));
    }
}
