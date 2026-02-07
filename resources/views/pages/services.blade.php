@extends('layouts.app')

@section('title', 'Our Services - MG Visa Consultant')

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">Our <span class="gradient-text">Services</span></h1>
            <p class="page-subtitle">Comprehensive visa consultation services tailored to your needs</p>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-page">
        <div class="container">
            <div class="services-grid">
                @foreach($services as $service)
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas {{ $service->icon }}"></i>
                        </div>
                        <h3 class="service-title">{{ $service->title }}</h3>
                        <p class="service-description">{{ $service->short_description }}</p>
                        <a href="https://wa.me/923002194957" target="_blank" class="service-link">
                            Get Started
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection