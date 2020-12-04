<?php

namespace App\Http\Controllers;

use App\Models\Kata;
use Illuminate\Http\Request;

class KataController extends Controller
{
    public function index()
    {
        return view('kata.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Kata $kata)
    {
        return view('kata.show', compact('kata'));
    }

    public function edit(Kata $kata)
    {
        //
    }

    public function update(Request $request, Kata $kata)
    {
        //
    }

    public function destroy(Kata $kata)
    {
        //
    }
}
