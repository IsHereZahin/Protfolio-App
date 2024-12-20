<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Hero;
use App\Models\Fact;
use App\Models\Skill;
use App\Models\HeroTitle;
use App\Models\Summary;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skillDescription = DB::table('skills')->value('top_description');
        $about = About::first();
        $herotitle = HeroTitle::all();
        $hero = Hero::first();
        $fact = Fact::first();
        $skills = Skill::all();
        $summary = Summary::first();
        $education = Education::all()->sortByDesc(fn($item) => is_null($item->end_date));
        $experience = Experience::all()->sortByDesc(fn($item) => is_null($item->end_date));
        $portfolio = Portfolio::all();
        return view('frontend.home.index', compact('hero', 'herotitle', 'about', 'fact', 'skills', 'skillDescription', 'summary', 'experience', 'education', 'portfolio'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
