<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MentorController extends Controller
{
    public function create()
    {
        return view('mentors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'bio' => 'required',
            'language' => 'required|in:en,my',
            'social_links' => 'required',
        ]);

        \App\Models\Mentor::create($request->all());

        return redirect()->route('mentors.create')->with('success', 'Mentor added successfully!');
    }

}
