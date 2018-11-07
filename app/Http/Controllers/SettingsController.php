<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function show()
    {
        return view('settings.show', ['user' => auth()->user()->id]);
    }

    public function edit()
    {
        return view('settings.edit', ['user' => auth()->user()->id]);
    }
}
