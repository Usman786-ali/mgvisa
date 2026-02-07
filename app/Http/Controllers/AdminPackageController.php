<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class AdminPackageController extends Controller
{
    public function index()
    {
        $packages = Package::orderBy('order')->get();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|in:standard,ramadan',
            'type' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'is_popular' => 'boolean',
            'is_active' => 'boolean',
        ]);

        // Handle features
        $features = [];
        if ($request->has('feature_text')) {
            foreach ($request->feature_text as $index => $text) {
                if (!empty($text)) {
                    $features[] = [
                        'text' => $text,
                        'included' => isset($request->feature_included[$index]) && $request->feature_included[$index] == '1',
                    ];
                }
            }
        }

        Package::create([
            'name' => $validated['name'],
            'category' => $validated['category'],
            'type' => $validated['type'],
            'price' => $validated['price'],
            'duration' => $validated['duration'],
            'icon' => $validated['icon'],
            'is_popular' => $request->has('is_popular'),
            'is_active' => $request->has('is_active'),
            'features' => $features,
        ]);

        return redirect()->route('admin.packages.index')->with('success', 'Package created successfully!');
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|in:standard,ramadan',
            'type' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'is_popular' => 'boolean',
            'is_active' => 'boolean',
        ]);

        // Handle features
        $features = [];
        if ($request->has('feature_text')) {
            foreach ($request->feature_text as $index => $text) {
                if (!empty($text)) {
                    $features[] = [
                        'text' => $text,
                        'included' => isset($request->feature_included[$index]) && $request->feature_included[$index] == '1',
                    ];
                }
            }
        }

        $package->update([
            'name' => $validated['name'],
            'category' => $validated['category'],
            'type' => $validated['type'],
            'price' => $validated['price'],
            'duration' => $validated['duration'],
            'icon' => $validated['icon'],
            'is_popular' => $request->has('is_popular'),
            'is_active' => $request->has('is_active'),
            'features' => $features,
        ]);

        return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully!');
    }

    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();
        return redirect()->route('admin.packages.index')->with('success', 'Package deleted successfully!');
    }
}
