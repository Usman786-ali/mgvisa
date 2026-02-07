@extends('layouts.admin')

@section('header', 'Manage Countries')

@section('content')
    <div style="margin-bottom: 20px; text-align: right;">
        <a href="{{ route('admin.countries.create') }}"
            style="background: var(--secondary-color); color: white; padding: 10px 20px; border-radius: 4px; text-decoration: none; font-weight: 500;">Add
            New Country</a>
    </div>

    <div style="background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); overflow: hidden;">
        <table class="recent-table">
            <thead>
                <tr>
                    <th style="width: 50px;">Order</th>
                    <th>Country Name</th>
                    <th>Processing Time</th>
                    <th>Fees</th>
                    <th style="width: 100px;">Popular</th>
                    <th style="width: 100px;">Status</th>
                    <th style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($countries as $country)
                    <tr>
                        <td>{{ $country->order }}</td>
                        <td><strong>{{ $country->name }}</strong></td>
                        <td>{{ $country->processing_time ?? 'N/A' }}</td>
                        <td>${{ number_format($country->fees ?? 0, 2) }}</td>
                        <td>
                            <span
                                style="padding: 2px 8px; border-radius: 10px; font-size: 0.8rem; {{ $country->is_popular ? 'background: #fef3c7; color: #92400e' : 'background: #e5e7eb; color: #6b7280' }}">
                                {{ $country->is_popular ? 'Yes' : 'No' }}
                            </span>
                        </td>
                        <td>
                            <span
                                style="padding: 2px 8px; border-radius: 10px; font-size: 0.8rem; background: {{ $country->is_active ? '#d1fae5' : '#fee2e2' }}; color: {{ $country->is_active ? '#065f46' : '#991b1b' }}">
                                {{ $country->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <div style="display: flex; gap: 10px;">
                                <a href="{{ route('admin.countries.edit', $country->id) }}"
                                    style="color: blue; text-decoration: none;">Edit</a>
                                <form action="{{ route('admin.countries.destroy', $country->id) }}" method="POST"
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