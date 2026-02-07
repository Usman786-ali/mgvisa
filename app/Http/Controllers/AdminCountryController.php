<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Str;

class AdminCountryController extends Controller
{
    public function index()
    {
        $countries = Country::orderBy('order')->get();
        return view('admin.countries.index', compact('countries'));
    }

    public function create()
    {
        return view('admin.countries.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'processing_time' => 'nullable|string',
            'fees' => 'nullable|numeric',
            'order' => 'integer',
            'is_popular' => 'boolean',
        ]);

        $data['slug'] = Str::slug($data['name']);
        $data['is_active'] = true;
        $data['is_popular'] = $request->has('is_popular');

        Country::create($data);

        return redirect()->route('admin.countries.index')->with('success', 'Country added successfully.');
    }

    public function edit(Country $country)
    {
        return view('admin.countries.edit', compact('country'));
    }

    public function update(Request $request, Country $country)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'processing_time' => 'nullable|string',
            'fees' => 'nullable|numeric',
            'order' => 'integer',
            'is_popular' => 'boolean',
        ]);

        $data['is_popular'] = $request->has('is_popular');
        $country->update($data);

        return redirect()->route('admin.countries.index')->with('success', 'Country updated successfully.');
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return back()->with('success', 'Country deleted successfully.');
    }

    public function toggleActive(Country $country)
    {
        $country->update(['is_active' => !$country->is_active]);
        return back()->with('success', 'Country status updated.');
    }
}
