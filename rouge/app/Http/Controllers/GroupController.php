<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GroupController extends Controller
{
    public function index()
{
    $json = Storage::get('data/groupes.json');
    $data = json_decode($json, true);
    $groups = $data['groups'];

    return view('groupes', compact( 'groups'));
}
}
