<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experience::all();
        return view('backend.section.resume.experience.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.section.resume.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'position' => 'required',
            'company' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string',
            'currently_employed' => 'boolean',
        ]);

        Experience::create([
            'position' => $validated['position'],
            'company' => $validated['company'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'description' => $validated['description'],
            'currently_employed' => $request->has('currently_employed'),
        ]);

        return redirect()->route('dashboard.experience.index')->with('success', 'Experience record created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience)
    {
        return view('backend.section.resume.experience.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'required|string',
        ]);

        $experience = Experience::findOrFail($id);

        if ($request->has('currently_employed')) {
            $validatedData['end_date'] = null;
        }

        $experience->update($validatedData);

        return redirect()->route('dashboard.experience.index')->with('success', 'Experience record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();

        return redirect()->route('dashboard.experience.index')
                        ->with('success', 'Experience deleted successfully.');
    }
}
