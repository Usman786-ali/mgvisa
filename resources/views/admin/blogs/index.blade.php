@extends('layouts.admin')

@section('header', 'Manage Blogs')

@section('content')
    <div
        style="background: white; padding: 20px; border-radius: 8px; margin-bottom: 30px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="margin: 0;">Recent Blogs</h3>
            <a href="{{ route('admin.blogs.create') }}"
                style="background: var(--secondary-color); color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; font-weight: 500;">Add
                New Blog</a>
        </div>

        <table class="recent-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                    <tr>
                        <td>
                            @if($blog->image)
                                <img src="{{ asset($blog->image) }}" alt=""
                                    style="width: 50px; height: 35px; object-fit: cover; border-radius: 4px;">
                            @else
                                <div style="width: 50px; height: 35px; background: #eee; border-radius: 4px;"></div>
                            @endif
                        </td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->author }}</td>
                        <td>{{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'Draft' }}</td>
                        <td>
                            <span
                                style="padding: 2px 8px; border-radius: 10px; font-size: 0.8rem; background: {{ $blog->is_active ? '#d1fae5' : '#fee2e2' }}; color: {{ $blog->is_active ? '#065f46' : '#991b1b' }}">
                                {{ $blog->is_active ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td>
                            <div style="display: flex; gap: 10px;">
                                <a href="{{ route('admin.blogs.edit', $blog->id) }}"
                                    style="color: blue; text-decoration: none;">Edit</a>
                                <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?');" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        style="color: red; background: none; border: none; cursor: pointer; padding: 0;">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection