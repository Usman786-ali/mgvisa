<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = \App\Models\Service::where('is_active', true)
            ->orderBy('order')
            ->get();

        $countries = \App\Models\Country::where('is_active', true)
            ->orderBy('order')
            ->limit(6)
            ->get();

        $testimonials = \App\Models\Testimonial::where('is_active', true)
            ->where('is_featured', true)
            ->orderBy('order')
            ->get();

        $visaTypes = \App\Models\VisaType::where('is_active', true)
            ->orderBy('order')
            ->get();

        $team = \App\Models\TeamMember::where('is_active', true)
            ->orderBy('order')
            ->get();

        $packages = \App\Models\Package::where('is_active', true)
            ->where('category', 'standard')
            ->orderBy('order')
            ->get();

        return view('home', compact('services', 'countries', 'testimonials', 'visaTypes', 'team', 'packages'));
    }

    public function ramadan()
    {
        $packages = \App\Models\Package::where('is_active', true)
            ->where('category', 'ramadan')
            ->orderBy('order')
            ->get();

        return view('pages.ramadan', compact('packages'));
    }

    public function services()
    {
        $services = \App\Models\Service::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('pages.services', compact('services'));
    }

    public function countries()
    {
        $countries = \App\Models\Country::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('pages.countries', compact('countries'));
    }

    public function blogs()
    {
        $blogs = \App\Models\Blog::where('is_active', true)->latest()->get();
        return view('pages.blogs', compact('blogs'));
    }

    public function contact()
    {
        $countries = \App\Models\Country::where('is_active', true)
            ->orderBy('order')
            ->get();

        $visaTypes = \App\Models\VisaType::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('pages.contact', compact('countries', 'visaTypes'));
    }

}
