<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = auth()->user()->settings;

        return view('settings.index', compact('settings'));
    }

    public function edit()
    {
        $settings = auth()->user()->settings;

        return view('settings.edit', compact('settings'));
    }
}
