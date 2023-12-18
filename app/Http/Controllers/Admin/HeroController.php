<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero = Hero::first();
        return view('backend.section.hero.index', compact('hero'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.section.hero.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'image' => 'required|image|mimes:png,jpg',
        ]);

        $image = null;
        if (!empty($request->image)) {
            $image = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/hero'), $image);
        }

        Hero::query()->create([
            'name'          => $request->name,
            'surname'       => $request->surname,
            'twitter_url'   => $request->twitter_url,
            'fb_url'        => $request->fb_url,
            'in_url'        => $request->in_url,
            'sk_url'        => $request->sk_url,
            'ln_url'        => $request->ln_url,
            'image'         => $image,
        ]);

        return redirect()->route('dashboard.hero.index')->with('success', 'Data added successfully!');
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
    public function edit()
    {
        //
        $hero = Hero::first();
        return view('backend.section.hero.edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
        ]);

        // Get the old image
        $OldImage = Hero::query()->select('image')->first();

        if (!empty($request->image)) {
            // Generate a new image file name using the current timestamp
            $image = time() . '.' . $request->image->extension();

            // Move the new image to the specified directory
            $request->image->move(public_path('images/hero'), $image);

            // Delete the old image if it exists
            if (File::exists(public_path('images/hero/' . $OldImage->image))) {
                File::delete(public_path('images/hero/' . $OldImage->image));
            }
        } else {
            // If no new image is provided, use the old image
            $image = $OldImage->image;
        }


        Hero::query()->update([
            'name'          => $request->name,
            'surname'       => $request->surname,
            'twitter_url'   => $request->twitter_url,
            'fb_url'        => $request->fb_url,
            'in_url'        => $request->in_url,
            'sk_url'        => $request->sk_url,
            'ln_url'        => $request->ln_url,
            'image'         => $image,
        ]);
        return redirect()->route('dashboard.hero.index')->with('success','Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
