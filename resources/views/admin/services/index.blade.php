@extends('layouts.admin')

@section('header', 'Manage Services')

@section('content')
    <div style="margin-bottom: 20px; text-align: right;">
        <a href="{{ route('admin.services.create') }}"
            style="background: var(--secondary-color); color: white; padding: 10px 20px; border-radius: 4px; text-decoration: none; font-weight: 500;">Add
            New Service</a>
    </div>

    <div style="background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); overflow: hidden;">
        <table class="recent-table">
            <thead>
                <tr>
                    <th style="width: 50px;">Order</th>
                    <th style="width: 50px;">Icon</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                    <tr>
                        <td>{{ $service->order }}</td>
                        <td><i class="fas {{ $service->icon }}" style="font-size: 1.2rem; color: var(--secondary-color);"></i>
                        </td>
                        <td>
                            <strong>{{ $service->title }}</strong>
                        </td>
                        <td>{{ $service->short_description }}</td>
                        <td>
                            <div style="display: flex; gap: 10px;">
                                <a href="{{ route('admin.services.edit', $service->id) }}"
                                    style="color: blue; text-decoration: none;">Edit</a>
                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?');">
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