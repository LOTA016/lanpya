<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentor;

class MentorController extends Controller
{
    public function index(Request $request)
    {
        // Optional filtering by language, industry, expertise, location
        $query = Mentor::query();

        if ($request->filled('language')) {
            $query->where('language', $request->language);
        }
        if ($request->filled('industry')) {
            $query->where('industry', 'like', "%{$request->industry}%");
        }
        if ($request->filled('expertise')) {
            $query->where('expertise', 'like', "%{$request->expertise}%");
        }
        if ($request->filled('location')) {
            $query->where('location', 'like', "%{$request->location}%");
        }

        $mentors = $query->paginate(10);

        return view('mentors.index', compact('mentors'));
    }

    public function create()
    {
        return view('mentors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'bio' => 'required|string',
            'language' => 'required|string',
            'social_links' => 'required|string',
            // new optional fields
            'industry' => 'nullable|string|max:255',
            'expertise' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'experience_level' => 'nullable|string|max:50',
            'availability' => 'nullable|string|max:255',
            'profile_photo' => 'nullable|image|max:2048', // max 2MB
        ]);

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('mentors/photos', 'public');
            $validated['profile_photo'] = $path;
        }

        Mentor::create($validated);

        return redirect()->route('mentors.index')->with('success', 'Mentor added successfully.');
    }

}
