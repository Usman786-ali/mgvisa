@extends('layouts.admin')

@section('title', 'Manage Reviews')

@section('content')
    <div style="padding: 2rem;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h1 style="font-size: 2rem; font-weight: 700; color: #1f2937;">Manage Reviews</h1>
            <a href="{{ route('admin.reviews.create') }}"
                style="background: linear-gradient(135deg, #9C7A1A 0%, #B8941F 100%); color: white; padding: 0.75rem 1.5rem; border-radius: 8px; text-decoration: none; font-weight: 600; box-shadow: 0 4px 12px rgba(184, 148, 31, 0.3); display: inline-flex; align-items: center; gap: 0.5rem;">
                <i class="fas fa-plus"></i> Add New Review
            </a>
        </div>

        @if(session('success'))
            <div
                style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <div style="background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); overflow: hidden;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #f9fafb; border-bottom: 2px solid #e5e7eb;">
                        <th style="padding: 1rem; text-align: left; font-weight: 600; color: #4b5563;">Client Name</th>
                        <th style="padding: 1rem; text-align: left; font-weight: 600; color: #4b5563;">Country</th>
                        <th style="padding: 1rem; text-align: left; font-weight: 600; color: #4b5563;">Rating</th>
                        <th style="padding: 1rem; text-align: left; font-weight: 600; color: #4b5563;">Message</th>
                        <th style="padding: 1rem; text-align: left; font-weight: 600; color: #4b5563;">Status</th>
                        <th style="padding: 1rem; text-align: center; font-weight: 600; color: #4b5563;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reviews as $review)
                        <tr style="border-bottom: 1px solid #e5e7eb;">
                            <td style="padding: 1rem;">
                                <strong>{{ $review->client_name }}</strong>
                                @if($review->position || $review->company)
                                    <br><small style="color: #6b7280;">
                                        {{ $review->position }}@if($review->position && $review->company),
                                        @endif{{ $review->company }}
                                    </small>
                                @endif
                            </td>
                            <td style="padding: 1rem; color: #6b7280;">{{ $review->country ?? 'N/A' }}</td>
                            <td style="padding: 1rem;">
                                @for($i = 0; $i < $review->rating; $i++)
                                    <i class="fas fa-star" style="color: #F59E0B;"></i>
                                @endfor
                            </td>
                            <td style="padding: 1rem; color: #6b7280; max-width: 300px;">
                                {{ Str::limit($review->message, 80) }}
                            </td>
                            <td style="padding: 1rem;">
                                <div style="display: flex; gap: 0.5rem; align-items: center;">
                                    <span
                                        style="padding: 0.35rem 0.75rem; border-radius: 12px; font-size: 0.85rem; background: {{ $review->is_active ? '#d1fae5' : '#fee2e2' }}; color: {{ $review->is_active ? '#065f46' : '#991b1b' }};">
                                        {{ $review->is_active ? 'Approved' : 'Pending' }}
                                    </span>
                                    @if($review->is_featured)
                                        <span
                                            style="padding: 0.35rem 0.75rem; border-radius: 12px; font-size: 0.85rem; background: #fef3c7; color: #92400e;">
                                            <i class="fas fa-star"></i> Featured
                                        </span>
                                    @endif
                                </div>
                            </td>
                            <td style="padding: 1rem;">
                                <div style="display: flex; gap: 0.5rem; justify-content: center; flex-wrap: wrap;">
                                    @if(!$review->is_active)
                                        <form action="{{ route('admin.reviews.approve', $review) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            <button type="submit"
                                                style="background: #10b981; color: white; padding: 0.35rem 0.75rem; border-radius: 6px; border: none; cursor: pointer; font-size: 0.85rem;">
                                                <i class="fas fa-check"></i> Approve
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.reviews.reject', $review) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            <button type="submit"
                                                style="background: #f59e0b; color: white; padding: 0.35rem 0.75rem; border-radius: 6px; border: none; cursor: pointer; font-size: 0.85rem;">
                                                <i class="fas fa-times"></i> Reject
                                            </button>
                                        </form>
                                    @endif

                                    <form action="{{ route('admin.reviews.toggle-featured', $review) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        <button type="submit"
                                            style="background: {{ $review->is_featured ? '#fbbf24' : '#e5e7eb' }}; color: {{ $review->is_featured ? 'white' : '#6b7280' }}; padding: 0.35rem 0.75rem; border-radius: 6px; border: none; cursor: pointer; font-size: 0.85rem;">
                                            <i class="fas fa-star"></i>
                                        </button>
                                    </form>

                                    <a href="{{ route('admin.reviews.edit', $review) }}"
                                        style="background: #3b82f6; color: white; padding: 0.35rem 0.75rem; border-radius: 6px; text-decoration: none; font-size: 0.85rem; display: inline-block;">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST"
                                        style="display: inline;"
                                        onsubmit="return confirm('Are you sure you want to delete this review?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            style="background: #ef4444; color: white; padding: 0.35rem 0.75rem; border-radius: 6px; border: none; cursor: pointer; font-size: 0.85rem;">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="padding: 3rem; text-align: center; color: #9ca3af;">
                                <i class="fas fa-star"
                                    style="font-size: 3rem; margin-bottom: 1rem; display: block; opacity: 0.3;"></i>
                                No reviews found. Add your first review!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($reviews->hasPages())
            <div style="margin-top: 2rem;">
                {{ $reviews->links() }}
            </div>
        @endif
    </div>
@endsection