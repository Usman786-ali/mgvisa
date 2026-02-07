@extends('layouts.admin')

@section('header', 'Site Settings')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card"
                style="background:white; border-radius:8px; box-shadow:0 2px 4px rgba(0,0,0,0.05); overflow:hidden;">
                <div class="card-header" style="background: #f9fafb; padding: 15px 20px; border-bottom: 1px solid #e5e7eb;">
                    <h3 style="margin:0; font-size:1.1rem; color:#374151;">General Information</h3>
                </div>
                <div class="card-body" style="padding: 20px;">
                    <form action="{{ route('admin.settings.update') }}" method="POST">
                        @csrf

                        <div style="margin-bottom: 20px;">
                            <label style="display:block; margin-bottom:5px; font-weight:500; color:#4b5563;">Site
                                Name</label>
                            <input type="text" name="site_name"
                                value="{{ $settings['general']->where('key', 'site_name')->first()->value ?? '' }}"
                                style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:4px;">
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label style="display:block; margin-bottom:5px; font-weight:500; color:#4b5563;">Tagline</label>
                            <input type="text" name="site_tagline"
                                value="{{ $settings['general']->where('key', 'site_tagline')->first()->value ?? '' }}"
                                style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:4px;">
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label
                                style="display:block; margin-bottom:5px; font-weight:500; color:#4b5563;">Description</label>
                            <textarea name="site_description" rows="4"
                                style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:4px;">{{ $settings['general']->where('key', 'site_description')->first()->value ?? '' }}</textarea>
                        </div>

                        <h4
                            style="margin-top: 30px; margin-bottom: 15px; color:#374151; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                            Contact Information</h4>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                            <div>
                                <label style="display:block; margin-bottom:5px; font-weight:500; color:#4b5563;">Email
                                    Address</label>
                                <input type="email" name="contact_email"
                                    value="{{ $settings['contact']->where('key', 'contact_email')->first()->value ?? '' }}"
                                    style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:4px;">
                            </div>
                            <div>
                                <label style="display:block; margin-bottom:5px; font-weight:500; color:#4b5563;">Phone
                                    Number</label>
                                <input type="text" name="contact_phone"
                                    value="{{ $settings['contact']->where('key', 'contact_phone')->first()->value ?? '' }}"
                                    style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:4px;">
                            </div>
                            <div>
                                <label style="display:block; margin-bottom:5px; font-weight:500; color:#4b5563;">WhatsApp
                                    Number</label>
                                <input type="text" name="contact_whatsapp"
                                    value="{{ $settings['contact']->where('key', 'contact_whatsapp')->first()->value ?? '' }}"
                                    style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:4px;">
                            </div>
                            <div style="grid-column: span 2;">
                                <label style="display:block; margin-bottom:5px; font-weight:500; color:#4b5563;">Office
                                    Address</label>
                                <textarea name="contact_address" rows="2"
                                    style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:4px;">{{ $settings['contact']->where('key', 'contact_address')->first()->value ?? '' }}</textarea>
                            </div>
                        </div>

                        <h4
                            style="margin-top: 30px; margin-bottom: 15px; color:#374151; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                            Social Media Links</h4>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                            <div>
                                <label style="display:block; margin-bottom:5px; font-weight:500; color:#4b5563;"><i
                                        class="fab fa-facebook"></i> Facebook</label>
                                <input type="text" name="social_facebook"
                                    value="{{ $settings['social']->where('key', 'social_facebook')->first()->value ?? '' }}"
                                    style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:4px;">
                            </div>
                            <div>
                                <label style="display:block; margin-bottom:5px; font-weight:500; color:#4b5563;"><i
                                        class="fab fa-instagram"></i> Instagram</label>
                                <input type="text" name="social_instagram"
                                    value="{{ $settings['social']->where('key', 'social_instagram')->first()->value ?? '' }}"
                                    style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:4px;">
                            </div>
                            <div>
                                <label style="display:block; margin-bottom:5px; font-weight:500; color:#4b5563;"><i
                                        class="fab fa-youtube"></i> YouTube</label>
                                <input type="text" name="social_youtube"
                                    value="{{ $settings['social']->where('key', 'social_youtube')->first()->value ?? '' }}"
                                    style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:4px;">
                            </div>
                            <div>
                                <label style="display:block; margin-bottom:5px; font-weight:500; color:#4b5563;"><i
                                        class="fab fa-tiktok"></i> TikTok</label>
                                <input type="text" name="social_tiktok"
                                    value="{{ $settings['social']->where('key', 'social_tiktok')->first()->value ?? '' }}"
                                    style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:4px;">
                            </div>
                        </div>

                        <div style="margin-top: 30px; text-align: right;">
                            <button type="submit"
                                style="background: var(--secondary-color); color: white; border: none; padding: 12px 25px; border-radius: 4px; font-weight: 600; cursor: pointer;">Save
                                Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection