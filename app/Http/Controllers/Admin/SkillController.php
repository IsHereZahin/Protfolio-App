<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return view('backend.section.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('backend.section.skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:skills|max:255',
            'proficiency' => 'required|integer|between:0,100',
        ], [
            'name.unique' => 'The skill name must be unique. Please choose another name.',
        ]);

        Skill::create($request->all());

        return redirect()->route('dashboard.skills.index')
            ->with('success', 'Skill added successfully');
    }

    public function edit(Skill $skill)
    {
        return view('backend.section.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required|string|unique:skills,name,' . $skill->id . '|max:255',
            'proficiency' => 'required|integer|between:0,100',
        ], [
            'name.unique' => 'The skill name must be unique. Please choose another name.',
        ]);

        $skill->update($request->all());

        return redirect()->route('dashboard.skills.index')
            ->with('success', 'Skill updated successfully');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('dashboard.skills.index')
            ->with('success', 'Skill deleted successfully');
    }

    public function editDescription()
    {
        // Check if there's any existing data in the skills table
        $description = DB::table('skills')->first();

        if (!$description) {
            // Insert a default row with a top_description and placeholders for `name` and `proficiency`
            DB::table('skills')->insert([
                'top_description' => 'Default description',
                'name' => 'Default Skill', // Placeholder for `name`
                'proficiency' => 0, // Placeholder for `proficiency`
            ]);
            $description = DB::table('skills')->first(); // Fetch the newly inserted row
        }

        // Pass 'top_description' directly to the view
        return view('backend.section.skills.edit_description', ['topDescription' => $description->top_description]);
    }


    public function updateDescription(Request $request)
    {
        $request->validate([
            'top_description' => 'required|string|max:255',
        ], [
            'top_description.required' => 'The description is required.',
            'top_description.string' => 'The description must be a valid string.',
            'top_description.max' => 'The description cannot exceed 255 characters.',
        ]);

        DB::table('skills')->update(['top_description' => $request->top_description]);

        return redirect()->route('dashboard.skills.index')->with('success', 'Top description updated successfully.');
    }
}
