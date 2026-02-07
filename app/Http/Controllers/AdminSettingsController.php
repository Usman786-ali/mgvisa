<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\File;

class AdminSettingsController extends Controller
{
    public function index()
    {
        // Group settings by their 'group' column for organized display
        $settings = SiteSetting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except('_token');

        foreach ($data as $key => $value) {
            $setting = SiteSetting::where('key', $key)->first();

            if ($setting) {
                // specific logic for file uploads if we name inputs like 'setting_image_key'
                if ($request->hasFile($key)) {
                    // Handle image upload logic later or generically here if needed
                    // simpler to keep separate helper or dedicated method
                    continue;
                }

                $setting->update(['value' => $value]);
            }
        }

        return back()->with('success', 'Settings updated successfully!');
    }

    public function updateImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'key' => 'required|exists:site_settings,key'
        ]);

        $setting = SiteSetting::where('key', $request->key)->first();

        if ($request->hasFile('image')) {
            // Delete old image if exists and not default
            if ($setting->value && File::exists(public_path($setting->value))) {
                // File::delete(public_path($setting->value)); // Optional: delete old
            }

            $imageName = $request->key . '_' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/uploads'), $imageName);

            $setting->update(['value' => 'images/uploads/' . $imageName]);

            return back()->with('success', 'Image updated successfully!');
        }

        return back()->with('error', 'No image uploaded.');
    }

    /**
     * Show homepage settings page
     */
    public function homepage()
    {
        $settings = SiteSetting::whereIn('group', [
            'homepage_hero',
            'homepage_about',
            'homepage_stats',
            'homepage_services',
            'homepage_why',
            'homepage_packages',
            'homepage_process',
            'homepage_contact',
        ])->get()->groupBy('group');

        return view('admin.settings.homepage', compact('settings'));
    }

    /**
     * Update homepage settings
     */
    public function updateHomepage(Request $request)
    {
        $data = $request->except('_token', '_method', 'hero_media'); // Exclude hero_media from general loop
        $mediaType = $request->input('hero_media_type', 'image');

        // Explicitly Handle Hero Media Upload
        if ($request->hasFile('hero_media')) {
            $setting = SiteSetting::where('key', 'hero_media')->first();
            if ($setting) {
                // Delete old media
                if ($setting->value) {
                    if ($mediaType == 'slideshow') {
                        $oldImages = json_decode($setting->value, true) ?? [];
                        foreach ($oldImages as $oldImage) {
                            if (File::exists(public_path($oldImage))) {
                                File::delete(public_path($oldImage));
                            }
                        }
                    } else if (File::exists(public_path($setting->value))) {
                        File::delete(public_path($setting->value));
                    }
                }

                // Handle slideshow (multiple images)
                if ($mediaType == 'slideshow') {
                    $uploadedPaths = [];
                    $files = $request->file('hero_media');
                    // Ensure it's an array
                    if (!is_array($files)) {
                        $files = [$files];
                    }

                    foreach ($files as $file) {
                        $fileName = 'slideshow_' . time() . '_' . uniqid() . '.' . $file->extension();
                        $file->move(public_path('images/homepage'), $fileName);
                        $uploadedPaths[] = 'images/homepage/' . $fileName;
                    }
                    $setting->update(['value' => json_encode($uploadedPaths)]);
                }
                // Handle single file (image or video)
                else {
                    $file = $request->file('hero_media');
                    if (is_array($file)) {
                        $file = $file[0];
                    } // Handle case where array is sent but single expected

                    $fileName = 'hero_' . time() . '.' . $file->extension();
                    $file->move(public_path('images/homepage'), $fileName);
                    $setting->update(['value' => 'images/homepage/' . $fileName]);
                }
            }
        }

        foreach ($data as $key => $value) {
            $setting = SiteSetting::where('key', $key)->first();

            if ($setting) {
                // Handle file uploads (for other images mostly)
                if ($request->hasFile($key)) {
                    // Delete old file if exists
                    if ($setting->value && File::exists(public_path($setting->value))) {
                        File::delete(public_path($setting->value));
                    }

                    $file = $request->file($key);
                    $fileName = $key . '_' . time() . '.' . $file->extension();
                    $file->move(public_path('images/homepage'), $fileName);
                    $setting->update(['value' => 'images/homepage/' . $fileName]);
                }
                // Handle text values
                else {
                    $setting->update(['value' => $value]);
                }
            }
        }

        return back()->with('success', 'Homepage settings updated successfully!');
    }
}
