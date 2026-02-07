@extends('layouts.admin')

@section('title', 'Manage Testimonials')

@section('content')
    <div style="padding: 2rem;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h1 style="font-size: 2rem; font-weight: 700; color: #1f2937;">Manage Testimonials</h1>
            <a href="{{ route('admin.testimonials.create') }}"
                style="background: linear-gradient(135deg, #9C7A1A 0%, #B8941F 100%); color: white; padding: 0.75rem 1.5rem; border-radius: 8px; text-decoration: none; font-weight: 600; box-shadow: 0 4px 12px rgba(184, 148, 31, 0.3); display: inline-flex; align-items: center; gap: 0.5rem;">
                <i class="fas fa-plus"></i> Add New Testimonial
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
                        <th style="padding: 1rem; text-align: left; font-weight: 600; color: #4b5563;">Position</th>
                        <th style="padding: 1rem; text-align: left; font-weight: 600; color: #4b5563;">Rating</th>
                        <th style="padding: 1rem; text-align: left; font-weight: 600; color: #4b5563;">Message</th>
                        <th style="padding: 1rem; text-align: left; font-weight: 600; color: #4b5563;">Featured</th>
                        <th style="padding: 1rem; text-align: center; font-weight: 600; color: #4b5563;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $testimonial)
                        <tr style="border-bottom: 1px solid #e5e7eb;">
                            <td style="padding: 1rem;">
                                <strong>{{ $testimonial->client_name }}</strong>
                            </td>
                            <td style="padding: 1rem; color: #6b7280;">
                                {{ $testimonial->position ?? 'N/A' }}
                                @if($testimonial->company)
                                    <br><small style="color: #9ca3af;">{{ $testimonial->company }}</small>
                                @endif
                            </td>
                            <td style="padding: 1rem;">
                                @for($i = 0; $i < $testimonial->rating; $i++)
                                    <i class="fas fa-star" style="color: #F59E0B;"></i>
                                @endfor
                            </td>
                            <td style="padding: 1rem; color: #6b7280; max-width: 300px;">
                                {{ Str::limit($testimonial->message, 80) }}
                            </td>
                            <td style="padding: 1rem;">
                                <form action="{{ route('admin.testimonials.toggle-featured', $testimonial) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    <button type="submit"
                                        style="background: {{ $testimonial->is_featured ? '#10b981' : '#e5e7eb' }}; color: {{ $testimonial->is_featured ? 'white' : '#6b7280' }}; border: none; padding: 0.35rem 0.75rem; border-radius: 6px; cursor: pointer; font-size: 0.85rem; font-weight: 500;">
                                        <i class="fas fa-star"></i>
                                        {{ $testimonial->is_featured ? 'Featured' : 'Not Featured' }}
                                    </button>
                                </form>
                            </td>
                            <td style="padding: 1rem; text-align: center;">
                                <div style="display: flex; gap: 0.5rem; justify-content: center;">
                                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}"
                                        style="background: #3b82f6; color: white; padding: 0.5rem 0.75rem; border-radius: 6px; text-decoration: none; font-size: 0.875rem;">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST"
                                        style="display: inline;"
                                        onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            style="background: #ef4444; color: white; padding: 0.5rem 0.75rem; border-radius: 6px; border: none; cursor: pointer; font-size: 0.875rem;">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="padding: 3rem; text-align: center; color: #9ca3af;">
                                <i class="fas fa-comments"
                                    style="font-size: 3rem; margin-bottom: 1rem; display: block; opacity: 0.3;"></i>
                                No testimonials found. Add your first testimonial!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($testimonials->hasPages())
            <div style="margin-top: 2rem;">
                {{ $testimonials->links() }}
            </div>
        @endif
    </div>
@endsection