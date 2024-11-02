<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

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
}
