<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function kataList()
    {
        return view('kata-list');
    }

    public function randomizer()
    {
        return view('group-randomizer');
    }
}
