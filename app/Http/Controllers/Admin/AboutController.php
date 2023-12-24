<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $about = About::first();
        return view('backend.section.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.section.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'top_desc'      => 'required',
            'sort_desc'     => 'required',
            'headline'      => 'required',
            'birthday'      => 'required',
            'website'       => 'required',
            'phone'         => 'required',
            'city'          => 'required',
            'age'           => 'required',
            'degree'        => 'required',
            'email'         => 'required',
            'freelance'     => 'required',
            'long_desc'     => 'required|max:255',
            'image'         => 'required|image|mimes:png,jpg',
        ]);

        $image = null;
        if(!empty($request->image)) {
            $image = time() .'.'. $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/about'), $image);
        }

        About::query()->create([
            'top_desc'      => $request->top_desc,
            'sort_desc'     => $request->sort_desc,
            'headline'      => $request->headline,
            'birthday'      => $request->birthday,
            'website'       => $request->website,
            'phone'         => $request->phone,
            'city'          => $request->city,
            'age'           => $request->age,
            'degree'        => $request->degree,
            'email'         => $request->email,
            'freelance'     => $request->freelance,
            'long_desc'     => $request->long_desc,
            'image'         => $image,
        ]);

        return redirect()->route('dashboard.about.index')->with('success','Data added successfully!');
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
