<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings.index', ['user' => auth()->user()->id]);
    }

    public function edit()
    {
        return view('settings.edit', ['user' => auth()->user()->id]);
    }
}
