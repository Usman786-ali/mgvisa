@extends('layouts.app')

@section('title', 'Blogs - MG Visa Consultant')

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">Our <span class="gradient-text">Blogs</span></h1>
            <p class="page-subtitle">Latest news, tips and updates about visa and immigration</p>
        </div>
    </section>

    <!-- Blogs Section -->
    <section class="blogs-page">
        <div class="container">
            <div class="blogs-grid">
                @forelse($blogs as $blog)
                    <div class="blog-card">
                        <div class="blog-image">
                            @if($blog->image)
                                <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
                            @else
                                <div style="height: 200px; background: #eee; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-image" style="font-size: 3rem; color: #ccc;"></i>
                                </div>
                            @endif
                        </div>
                        <div class="blog-content">
                            <span class="blog-category">Visa Updates</span>
                            <h3 class="blog-title">{{ $blog->title }}</h3>
                            <p class="blog-excerpt">{{ Str::limit($blog->excerpt, 100) }}</p>
                            <div class="blog-meta">
                                <span><i class="far fa-calendar"></i> {{ $blog->published_at ? $blog->published_at->format('M d, Y') : '' }}</span>
                                <span><i class="fas fa-user"></i> {{ $blog->author }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div style="grid-column: 1 / -1; text-align: center; padding: 40px;">
                        <p style="font-size: 1.2rem; color: #666;">No blogs published yet.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection