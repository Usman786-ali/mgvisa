<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'country' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'message' => 'required|string|min:10|max:1000',
        ]);

        Testimonial::create([
            'client_name' => $validated['client_name'],
            'email' => $validated['email'],
            'country' => $validated['country'] ?? 'Pakistan',
            'rating' => $validated['rating'],
            'message' => $validated['message'],
            'position' => 'Client',
            'company' => null,
            'is_active' => false, // Admin approval required
            'is_featured' => false,
            'order' => 999,
        ]);

        return redirect()->back()->with('review_success', 'Thank you for your review! It will be published after approval.');
    }
}
