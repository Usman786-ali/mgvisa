@extends('layouts.admin')

@section('header', 'Client Inquiries')

@section('content')
    <div style="background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); overflow: hidden;">
        <table class="recent-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Visa Type</th>
                    <th>Country</th>
                    <th>Date</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($inquiries as $inquiry)
                    <tr>
                        <td><strong>{{ $inquiry->name }}</strong></td>
                        <td>{{ $inquiry->visa_type ?? 'N/A' }}</td>
                        <td>{{ $inquiry->country_of_interest ?? 'N/A' }}</td>
                        <td>{{ $inquiry->created_at->format('M d, Y') }}</td>
                        <td>{{ $inquiry->email }}</td>
                        <td>{{ $inquiry->phone ?? 'N/A' }}</td>
                        <td>
                            <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST"
                                onsubmit="return confirm('Delete this inquiry?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    style="color: red; background: none; border: none; cursor: pointer;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center; color: #6b7280; padding: 40px;">No inquiries yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div style="padding: 20px;">
            {{ $inquiries->links() }}
        </div>
    </div>
@endsection