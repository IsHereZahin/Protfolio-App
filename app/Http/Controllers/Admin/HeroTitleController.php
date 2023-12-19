<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroTitle;
use Illuminate\Http\Request;

class HeroTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $herotitle = HeroTitle::query()->get();
        return view('backend.section.hero.herotitle.index', compact('herotitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.section.hero.herotitle.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'herotitle'=> 'required',
        ]);
        HeroTitle::query()->create([
            'herotitle' => $request->herotitle,
        ]);
        return redirect()->route('dashboard.hero.title.index')->with('success', 'Data added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $herotitle = HeroTitle::query()->findOrFail($id);
        return view('backend.section.hero.herotitle.edit', compact('herotitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'herotitle'=> 'required',
        ]);
        HeroTitle::query()->findOrFail($id)->update([
            'herotitle'=> $request->herotitle,
        ]);
        return redirect()->route('dashboard.hero.title.index')->with('success','Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        //
        HeroTitle::query()->findOrFail($id)->delete();
        return redirect()->route('dashboard.hero.title.index')->with('success','Data deleted successfully!');
    }
}
