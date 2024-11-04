<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Summary;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    /**
     * Display the summary.
     */
    public function index()
    {
        $data = Summary::first();
        return view('backend.section.resume.summary.index', compact('data'));
    }

    /**
     * Show the form for creating a new summary.
     */
    public function create()
    {
        return view('backend.section.resume.summary.create');
    }

    /**
     * Store a newly created summary.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Summary::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('dashboard.summary.index')->with('success', 'Summary created successfully.');
    }

    /**
     * Show the form for editing the summary.
     */
    public function edit()
    {
        $summary = Summary::firstOrFail(); // Get the single summary
        return view('backend.section.resume.summary.edit', compact('summary'));
    }

    /**
     * Update the summary.
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $summary = Summary::firstOrFail(); // Get the single summary
        $summary->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('dashboard.summary.index')->with('success', 'Summary updated successfully.');
    }

    /**
     * Remove the summary.
     */
    public function destroy()
    {
        $summary = Summary::firstOrFail(); // Get the single summary
        $summary->delete(); // Delete the summary

        return redirect()->route('dashboard.summary.index')->with('success', 'Summary deleted successfully.');
    }
}
