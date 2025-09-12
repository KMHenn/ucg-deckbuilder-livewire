<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeckbuilderController extends Controller
{
    public function show(){
        return view('pages.deckbuilder');
    }
}
