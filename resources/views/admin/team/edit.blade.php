@extends('layouts.admin')

@section('header', 'Edit Team Member')

@section('content')
    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="margin: 0;">Edit Member: {{ $member->name }}</h3>
            <a href="{{ route('admin.team.index') }}" style="color: #666; text-decoration: none;">&larr; Back to List</a>
        </div>

        <form action="{{ route('admin.team.update', $member->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div>
                    <label style="display: block; margin-bottom: 5px; color: #4b5563;">Name</label>
                    <input type="text" name="name" value="{{ $member->name }}" required
                        style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 4px;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 5px; color: #4b5563;">Position</label>
                    <input type="text" name="position" value="{{ $member->position }}" required
                        style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 4px;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 5px; color: #4b5563;">Photo</label>
                    @if($member->image)
                        <div style="margin-bottom: 10px;">
                            <img src="{{ asset($member->image) }}" alt="Current Photo"
                                style="width: 100px; height: 100px; object-fit: cover; border-radius: 4px;">
                            <p style="font-size: 0.8rem; color: #666; margin: 5px 0;">Current Photo</p>
                        </div>
                    @endif
                    <input type="file" name="image"
                        style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 4px;">
                    <p style="font-size: 0.8rem; color: #666; margin-top: 5px;">Leave empty to keep current photo</p>
                </div>
                <div>
                    <label style="display: block; margin-bottom: 5px; color: #4b5563;">Order</label>
                    <input type="number" name="order" value="{{ $member->order }}"
                        style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 4px;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 5px; color: #4b5563;">WhatsApp Number</label>
                    <input type="text" name="whatsapp" value="{{ $member->whatsapp }}" placeholder="+92300..."
                        style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 4px;">
                </div>
                <div style="grid-column: span 2;">
                    <label style="display: block; margin-bottom: 5px; color: #4b5563;">Bio</label>
                    <textarea name="bio" rows="4"
                        style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 4px;">{{ $member->bio }}</textarea>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <button type="submit"
                    style="background: var(--secondary-color); color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; font-weight: 500;">Update
                    Member</button>
            </div>
        </form>
    </div>
@endsection