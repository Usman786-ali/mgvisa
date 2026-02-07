@extends('layouts.admin')

@section('header', 'Edit Service')

@section('content')
    <div class="card"
        style="background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); overflow: hidden;">
        <div class="card-body" style="padding: 30px;">
            <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div style="margin-bottom: 20px;">
                    <label style="display:block; margin-bottom:5px; font-weight:500; color:#4b5563;">Service Title</label>
                    <input type="text" name="title" value="{{ $service->title }}" required
                        style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:4px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display:block; margin-bottom:5px; font-weight:500; color:#4b5563;">Short
                        Description</label>
                    <input type="text" name="short_description" value="{{ $service->short_description }}" required
                        style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:4px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display:block; margin-bottom:5px; font-weight:500; color:#4b5563;">Full
                        Description</label>
                    <textarea name="description" required rows="5"
                        style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:4px;">{{ $service->description }}</textarea>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label style="display:block; margin-bottom:5px; font-weight:500; color:#4b5563;">Icon Class
                            (FontAwesome)</label>
                        <input type="text" name="icon" value="{{ $service->icon }}" required
                            style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:4px;">
                    </div>
                    <div>
                        <label style="display:block; margin-bottom:5px; font-weight:500; color:#4b5563;">Display
                            Order</label>
                        <input type="number" name="order" value="{{ $service->order }}"
                            style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:4px;">
                    </div>
                </div>

                <div style="text-align: right;">
                    <a href="{{ route('admin.services.index') }}"
                        style="color: #6b7280; text-decoration: none; margin-right: 15px;">Cancel</a>
                    <button type="submit"
                        style="background: var(--secondary-color); color: white; border: none; padding: 12px 25px; border-radius: 4px; font-weight: 600; cursor: pointer;">Update
                        Service</button>
                </div>
            </form>
        </div>
    </div>
@endsection