<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'country_of_interest' => 'nullable|string|max:255',
            'visa_type' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        \App\Models\Inquiry::create($validated);

        return redirect()->back()->withFragment('contact')->with('success', 'Thank you for contacting us! Our team will get back to you shortly.');
    }

}
