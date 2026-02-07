@extends('layouts.app')

@section('title', 'Countries We Serve - MG Visa Consultant')

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">Countries We <span class="gradient-text">Serve</span></h1>
            <p class="page-subtitle">Expert immigration and visa consultancy services for top destinations worldwide</p>
        </div>
    </section>

    <!-- Countries Section -->
    <section class="countries-page">
        <div class="container">
            @php
                $flagMap = [
                    'United States' => 'us',
                    'Canada' => 'ca',
                    'United Kingdom' => 'gb',
                    'Australia' => 'au',
                    'Schengen Countries' => 'eu',
                    'Dubai (UAE)' => 'ae',
                    'Germany' => 'de',
                    'France' => 'fr',
                    'Italy' => 'it',
                    'Spain' => 'es',
                    'New Zealand' => 'nz',
                    'Japan' => 'jp',
                    'China' => 'cn',
                    'Singapore' => 'sg',
                    'Malaysia' => 'my',
                    'Turkey' => 'tr',
                    'Saudi Arabia' => 'sa',
                    'Qatar' => 'qa',
                    'Oman' => 'om',
                    'Bahrain' => 'bh',
                    'Kuwait' => 'kw',
                ];
            @endphp

            <div class="countries-grid-page">
                @foreach($countries as $country)
                    <div class="country-card-page">
                        <div class="country-flag-large">
                            @if(array_key_exists($country->name, $flagMap))
                                <img src="https://flagcdn.com/w160/{{ $flagMap[$country->name] }}.png" alt="{{ $country->name }}">
                            @else
                                <i class="fas fa-flag"></i>
                            @endif
                        </div>
                        <h3 class="country-name">{{ $country->name }}</h3>
                        <p class="country-description">
                            {{ $country->description ?? 'Expert visa consultation for ' . $country->name }}
                        </p>
                        <a href="https://wa.me/923002194957" target="_blank" class="country-cta">
                            <i class="fab fa-whatsapp"></i>
                            Inquire Now
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection