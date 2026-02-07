<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class AdminReviewController extends Controller
{
    /**
     * Display a listing of reviews.
     */
    public function index()
    {
        $reviews = Testimonial::latest()->paginate(15);
        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new review.
     */
    public function create()
    {
        return view('admin.reviews.create');
    }

    /**
     * Store a newly created review.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'country' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'is_featured' => 'boolean',
        ]);

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = true; // Admin-created reviews are auto-approved

        Testimonial::create($validated);

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Review created successfully!');
    }

    /**
     * Show the form for editing the review.
     */
    public function edit(Testimonial $review)
    {
        return view('admin.reviews.edit', compact('review'));
    }

    /**
     * Update the specified review.
     */
    public function update(Request $request, Testimonial $review)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'country' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'is_featured' => 'boolean',
        ]);

        $validated['is_featured'] = $request->has('is_featured');

        $review->update($validated);

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Review updated successfully!');
    }

    /**
     * Approve review.
     */
    public function approve(Testimonial $review)
    {
        $review->update(['is_active' => true]);
        return back()->with('success', 'Review approved successfully.');
    }

    /**
     * Reject review.
     */
    public function reject(Testimonial $review)
    {
        $review->update(['is_active' => false]);
        return back()->with('success', 'Review rejected.');
    }

    /**
     * Toggle featured status.
     */
    public function toggleFeatured(Testimonial $review)
    {
        $review->update([
            'is_featured' => !$review->is_featured
        ]);

        return back()->with('success', 'Featured status updated!');
    }

    /**
     * Remove the specified review.
     */
    public function destroy(Testimonial $review)
    {
        $review->delete();
        return back()->with('success', 'Review deleted successfully.');
    }
}
