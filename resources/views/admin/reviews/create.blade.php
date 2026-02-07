@extends('layouts.admin')

@section('title', 'Add New review')

@section('content')
    <div style="padding: 2rem; max-width: 800px; margin: 0 auto;">
        <div style="margin-bottom: 2rem;">
            <a href="{{ route('admin.reviews.index') }}"
                style="color: #6b7280; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem;">
                <i class="fas fa-arrow-left"></i> Back to reviews
            </a>
            <h1 style="font-size: 2rem; font-weight: 700; color: #1f2937;">Add New review</h1>
        </div>

        <div style="background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); padding: 2rem;">
            <form action="{{ route('admin.reviews.store') }}" method="POST">
                @csrf

                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">
                        Client Name <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="text" name="client_name" value="{{ old('client_name') }}" required
                        style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;">
                    @error('client_name')
                        <p style="color: #ef4444; font-size: 0.875rem; margin-top: 0.25rem;">{{ $message }}</p>
                    @enderror
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">
                            Position/Title
                        </label>
                        <input type="text" name="position" value="{{ old('position') }}"
                            placeholder="e.g., CEO, Student, Traveler"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;">
                        @error('position')
                            <p style="color: #ef4444; font-size: 0.875rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">
                            Company
                        </label>
                        <input type="text" name="company" value="{{ old('company') }}" placeholder="e.g., ABC Corporation"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;">
                        @error('company')
                            <p style="color: #ef4444; font-size: 0.875rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">
                        Rating <span style="color: #ef4444;">*</span>
                    </label>
                    <div style="display: flex; gap: 1rem;">
                        @for($i = 1; $i <= 5; $i++)
                            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                                <input type="radio" name="rating" value="{{ $i }}" {{ old('rating') == $i || (!old('rating') && $i == 5) ? 'checked' : '' }} required>
                                <span>{{ $i }} <i class="fas fa-star" style="color: #F59E0B;"></i></span>
                            </label>
                        @endfor
                    </div>
                    @error('rating')
                        <p style="color: #ef4444; font-size: 0.875rem; margin-top: 0.25rem;">{{ $message }}</p>
                    @enderror
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">
                        review Message <span style="color: #ef4444;">*</span>
                    </label>
                    <textarea name="message" rows="5" required placeholder="Write the client's review here..."
                        style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; font-family: inherit;">{{ old('message') }}</textarea>
                    @error('message')
                        <p style="color: #ef4444; font-size: 0.875rem; margin-top: 0.25rem;">{{ $message }}</p>
                    @enderror
                </div>

                <div style="margin-bottom: 2rem;">
                    <label style="display: flex; align-items: center; gap: 0.75rem; cursor: pointer;">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                            style="width: 1.25rem; height: 1.25rem; cursor: pointer;">
                        <span style="font-weight: 600; color: #374151;">
                            <i class="fas fa-star" style="color: #F59E0B;"></i> Feature this review on homepage
                        </span>
                    </label>
                </div>

                <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                    <a href="{{ route('admin.reviews.index') }}"
                        style="background: #e5e7eb; color: #374151; padding: 0.75rem 1.5rem; border-radius: 8px; text-decoration: none; font-weight: 600;">
                        Cancel
                    </a>
                    <button type="submit"
                        style="background: linear-gradient(135deg, #9C7A1A 0%, #B8941F 100%); color: white; padding: 0.75rem 1.5rem; border-radius: 8px; border: none; cursor: pointer; font-weight: 600; box-shadow: 0 4px 12px rgba(184, 148, 31, 0.3);">
                        <i class="fas fa-save"></i> Save review
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
