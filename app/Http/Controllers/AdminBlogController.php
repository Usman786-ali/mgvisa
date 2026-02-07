<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class AdminBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image'
        ]);

        $data = $request->except('image');
        $data['slug'] = Str::slug($request->title);
        $data['published_at'] = now();
        $data['excerpt'] = $request->excerpt ?? Str::limit(strip_tags($request->content), 150);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/blogs'), $imageName);
            $data['image'] = 'images/blogs/' . $imageName;
        }

        Blog::create($data);
        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully.');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image'
        ]);

        $data = $request->except('image');
        $data['slug'] = Str::slug($request->title);
        $data['excerpt'] = $request->excerpt ?? Str::limit(strip_tags($request->content), 150);

        if ($request->hasFile('image')) {
            if ($blog->image && File::exists(public_path($blog->image))) {
                @unlink(public_path($blog->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/blogs'), $imageName);
            $data['image'] = 'images/blogs/' . $imageName;
        }

        $blog->update($data);
        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image && File::exists(public_path($blog->image))) {
            @unlink(public_path($blog->image));
        }
        $blog->delete();
        return back()->with('success', 'Blog deleted successfully.');
    }
}
