@extends('layouts.admin')

@section('header', 'Edit Blog')

@section('content')
    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="margin: 0;">Edit: {{ $blog->title }}</h3>
            <a href="{{ route('admin.blogs.index') }}" style="color: #666; text-decoration: none;">&larr; Back to List</a>
        </div>

        <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px;">
                <div style="display: flex; flex-direction: column; gap: 20px;">
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #4b5563;">Title</label>
                        <input type="text" name="title" value="{{ $blog->title }}" required
                            style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 4px;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #4b5563;">Content</label>
                        <textarea name="content" rows="15" required
                            style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 4px; font-family: sans-serif;">{{ $blog->content }}</textarea>
                    </div>
                </div>
                <div style="display: flex; flex-direction: column; gap: 20px;">
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #4b5563;">Cover Image</label>
                        @if($blog->image)
                            <div style="margin-bottom: 10px;">
                                <img src="{{ asset($blog->image) }}" alt="Current Image"
                                    style="width: 100%; height: auto; border-radius: 4px;">
                            </div>
                        @endif
                        <input type="file" name="image"
                            style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 4px;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #4b5563;">Excerpt (Optional)</label>
                        <textarea name="excerpt" rows="5"
                            style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 4px;">{{ $blog->excerpt }}</textarea>
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #4b5563;">Status</label>
                        <select name="is_active"
                            style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 4px;">
                            <option value="1" {{ $blog->is_active ? 'selected' : '' }}>Published</option>
                            <option value="0" {{ !$blog->is_active ? 'selected' : '' }}>Draft</option>
                        </select>
                    </div>
                </div>
            </div>
            <div style="margin-top: 20px; border-top: 1px solid #eee; padding-top: 20px;">
                <button type="submit"
                    style="background: var(--secondary-color); color: white; border: none; padding: 12px 25px; border-radius: 4px; font-weight: 600; cursor: pointer;">Update
                    Blog</button>
            </div>
        </form>
    </div>
@endsection