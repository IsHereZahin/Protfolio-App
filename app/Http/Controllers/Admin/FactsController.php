<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fact;
use Illuminate\Http\Request;

class FactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Fact::first();
        return view('backend.section.facts.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.section.facts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'top_description'  => 'required',
            'clients'          => 'required',
            'projects'         => 'required',
            'hours_of_support' => 'required|numeric',
            'awards'           => 'required',
        ]);

        Fact::create($request->all());

        return redirect()->route('dashboard.facts.index')
            ->with('success', 'Fact added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $fact = Fact::firstOrFail();
        return view('backend.section.facts.edit', compact('fact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'top_description'  => 'required',
            'clients'          => 'required',
            'projects'         => 'required',
            'hours_of_support' => 'required|numeric',
            'awards'           => 'required',
        ]);

        $fact = Fact::firstOrFail();
        $fact->update($request->all());

        return redirect()->route('dashboard.facts.index')
            ->with('success', 'Fact updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $fact = Fact::first();
        if ($fact) {
            $fact->delete();
            return redirect()->route('dashboard.facts.index')->with('success', 'Fact deleted successfully');
        } else {
            return redirect()->route('dashboard.facts.index')->with('error', 'No fact to delete');
        }
    }
}
