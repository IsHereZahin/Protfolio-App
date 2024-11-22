<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('backend.section.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        return view('backend.section.portfolio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:255',
            'project_date' => 'nullable|date',
            'project_url' => 'nullable|url',
            'main_thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'client_company_name' => 'nullable|string|max:255',
            'client_author' => 'nullable|string|max:255',
            'client_role' => 'nullable|string|max:255',
            'client_feedback' => 'nullable|string',
            'client_author_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $portfolio = new Portfolio($request->except(['main_thumbnail', 'images', 'client_author_image']));

        if ($request->hasFile('main_thumbnail')) {
            $portfolio->main_thumbnail = $request->file('main_thumbnail')->store('images/portfolio/thumbnails', 'public');
        }

        if ($request->hasFile('client_author_image')) {
            $portfolio->client_author_image = $request->file('client_author_image')->store('images/portfolio/authors', 'public');
        }

        $portfolio->client_company_name = $request->client_company_name;
        $portfolio->client_author = $request->client_author;
        $portfolio->client_role = $request->client_role;
        $portfolio->client_feedback = $request->client_feedback;

        $portfolio->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('images/portfolio/portfolios', 'public');
                PortfolioImage::create([
                    'portfolio_id' => $portfolio->id,
                    'image' => $imagePath,
                ]);
            }
        }

        return redirect()->route('dashboard.portfolio.index')->with('success', 'Portfolio created successfully!');
    }

    public function edit(Portfolio $portfolio)
    {
        return view('backend.section.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:255',
            'project_date' => 'nullable|date',
            'project_url' => 'nullable|url',
            'main_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'client_company_name' => 'nullable|string|max:255',
            'client_author' => 'nullable|string|max:255',
            'client_role' => 'nullable|string|max:255',
            'client_feedback' => 'nullable|string',
            'client_author_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $portfolio->update($request->except(['main_thumbnail', 'images', 'client_author_image']));

        if ($request->hasFile('main_thumbnail')) {
            if ($portfolio->main_thumbnail) {
                Storage::delete('public/' . $portfolio->main_thumbnail);
            }
            $portfolio->main_thumbnail = $request->file('main_thumbnail')->store('images/portfolio/thumbnails', 'public');
        }

        if ($request->hasFile('client_author_image')) {
            if ($portfolio->client_author_image) {
                Storage::delete('public/' . $portfolio->client_author_image);
            }

            $portfolio->client_author_image = $request->file('client_author_image')->store('images/portfolio/authors', 'public');
        }

        $portfolio->client_company_name = $request->client_company_name;
        $portfolio->client_author = $request->client_author;
        $portfolio->client_role = $request->client_role;
        $portfolio->client_feedback = $request->client_feedback;

        if ($request->hasFile('images')) {
            foreach ($portfolio->images as $oldImage) {
                Storage::delete('public/' . $oldImage->image);
                $oldImage->delete();
            }

            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('images/portfolio/portfolios', 'public');

                PortfolioImage::create([
                    'portfolio_id' => $portfolio->id,
                    'image' => $imagePath,
                ]);
            }
        }

        $portfolio->save();

        return redirect()->route('dashboard.portfolio.index')->with('success', 'Portfolio updated successfully!');
    }

    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->main_thumbnail) {
            Storage::disk('public')->delete($portfolio->main_thumbnail);
        }

        if ($portfolio->client_author_image) {
            Storage::disk('public')->delete($portfolio->client_author_image);
        }

        if ($portfolio->images) {
            foreach ($portfolio->images as $image) {
                Storage::disk('public')->delete($image->image);
                $image->delete();
            }
        }
        $portfolio->delete();

        return redirect()->route('dashboard.portfolio.index')->with('success', 'Portfolio deleted successfully!');
    }
}
