<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index() {
        $settings =  Settings::all();
        return view('admin.settings.index', ['settings' => $settings]);
    }

    public function store(Request $request) {
        Settings::truncate();

        foreach($request->input('key') as $key => $value)
        Settings::create([
           'key' => $key,
           'value' => $value
        ]);

        return redirect()->back();
    }
}
