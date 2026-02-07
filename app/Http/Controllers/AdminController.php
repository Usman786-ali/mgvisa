<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Country;
use App\Models\Testimonial;
use App\Models\Inquiry;
use App\Models\SiteSetting;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'services' => Service::count(),
            'countries' => Country::count(),
            'team' => TeamMember::count(),
            'inquiries' => Inquiry::count(),
            'pending_reviews' => Testimonial::where('is_active', false)->count(),
        ];

        $latestInquiries = Inquiry::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'latestInquiries'));
    }

    public function teamIndex()
    {
        $team = TeamMember::orderBy('order')->get();
        return view('admin.team.index', compact('team'));
    }

    public function storeTeam(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'order' => 'integer',
            'image' => 'nullable|image',
            'bio' => 'nullable|string',
            'whatsapp' => 'nullable|string'
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/team'), $imageName);
            $data['image'] = 'images/team/' . $imageName;
        }

        TeamMember::create($data);
        return back()->with('success', 'Team member added');
    }

    public function editTeam($id)
    {
        $member = TeamMember::findOrFail($id);
        return view('admin.team.edit', compact('member'));
    }

    public function updateTeam(Request $request, $id)
    {
        $member = TeamMember::findOrFail($id);

        $data = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'order' => 'integer',
            'image' => 'nullable|image',
            'bio' => 'nullable|string',
            'whatsapp' => 'nullable|string'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($member->image && file_exists(public_path($member->image))) {
                @unlink(public_path($member->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/team'), $imageName);
            $data['image'] = 'images/team/' . $imageName;
        }

        $member->update($data);
        return redirect()->route('admin.team.index')->with('success', 'Team member updated');
    }

    public function deleteTeam($id)
    {
        $member = TeamMember::findOrFail($id);
        if ($member->image && file_exists(public_path($member->image))) {
            @unlink(public_path($member->image));
        }
        $member->delete();
        return back()->with('success', 'Team member deleted');
    }

    // Additional methods for other resource management can be added here...
}
