@extends('layouts.app')
@section('title', 'Cultural Landmark Explorer — Home')

@section('content')

{{-- ══ HERO SECTION ══ --}}
<section class="hero-bg relative overflow-hidden min-h-[92vh] flex items-center">

    {{-- Dot pattern --}}
    <div class="absolute inset-0 opacity-10"
         style="background-image: radial-gradient(circle, rgba(255,255,255,0.8) 1px, transparent 1px);
                background-size: 28px 28px;"></div>

    <div class="relative max-w-7xl mx-auto px-6 py-16 w-full">
        <div class="grid lg:grid-cols-2 gap-16 items-center">

            {{-- ══ LEFT — Text ══ --}}
            <div>
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 bg-white/15 border border-white/25
                            rounded-full px-4 py-1.5 mb-8 fade-up">
                    <span class="w-2 h-2 bg-green-400 rounded-full animate-ping inline-block"></span>
                    <span class="text-white text-sm font-medium">Interactive Web System</span>
                </div>

                {{-- Title --}}
                <h1 class="font-title font-extrabold leading-none mb-6 fade-up-2">
                    <span class="text-white    text-6xl lg:text-7xl block">Cultural</span>
                    <span class="text-blue-200 text-6xl lg:text-7xl block">Landmark</span>
                    <span class="text-red-300  text-6xl lg:text-7xl block">Explorer</span>
                </h1>

                {{-- Description --}}
                <p class="text-white/70 text-lg leading-relaxed max-w-xl mb-8 fade-up-3">
                    Explore famous cultural landmarks from
                    <strong class="text-white">Cambodia</strong>
                    <span class="text-xs bg-white/20 px-1.5 py-0.5 rounded font-bold text-white">KH</span>
                    and the
                    <strong class="text-white">Philippines</strong>
                    <span class="text-xs bg-white/20 px-1.5 py-0.5 rounded font-bold text-white">PH</span>
                    in an interactive, visual, and educational way.
                </p>

                {{-- Feature pills --}}
                <div class="flex flex-wrap gap-3 mb-10 fade-up-3">
                    @foreach(['Interactive', 'Educational', 'Visual'] as $f)
                    <span class="bg-white/10 border border-white/25 text-white/90 text-sm
                                 px-5 py-2 rounded-full font-medium backdrop-blur-sm">
                        {{ $f }}
                    </span>
                    @endforeach
                </div>

                {{-- CTA Buttons --}}
                <div class="flex flex-wrap gap-4 fade-up-3">
                    <a href="{{ route('country.show', 'cambodia') }}"
                       class="bg-white text-blue-900 font-bold px-7 py-3.5 rounded-full
                              hover:bg-blue-50 transition shadow-xl shadow-blue-900/20
                              flex items-center gap-2 text-sm">
                        <span class="text-xs bg-blue-100 text-blue-800 px-1.5 py-0.5 rounded font-bold">KH</span>
                        Explore Cambodia
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                    <a href="{{ route('country.show', 'philippines') }}"
                       class="bg-red-600 text-white font-bold px-7 py-3.5 rounded-full
                              hover:bg-red-700 transition shadow-xl shadow-red-900/20
                              flex items-center gap-2 text-sm">
                        <span class="text-xs bg-red-800 text-white px-1.5 py-0.5 rounded font-bold">PH</span>
                        Explore Philippines
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>

            {{-- ══ RIGHT — Swipeable Image Slider ══ --}}
            <div class="hidden lg:flex flex-col gap-4 fade-up-2">

                {{-- Top label + counter --}}
                <div class="flex items-center justify-between">
                    <p class="text-white/70 text-xs font-bold tracking-widest uppercase">
                        🔥 Popular Places
                    </p>
                    <p class="text-white/50 text-xs font-mono">
                        <span id="hero-current">1</span>
                        <span class="text-white/30"> / </span>
                        <span id="hero-total">6</span>
                    </p>
                </div>

                {{-- ── MAIN SLIDER ── --}}
                <div class="relative rounded-3xl overflow-hidden shadow-2xl shadow-black/40"
                     style="height: 390px;">

                    {{-- Slides Wrapper --}}
                    <div id="hero-slider"
                         class="flex h-full"
                         style="transition: transform 0.7s cubic-bezier(0.25,0.46,0.45,0.94);">

                        {{-- ── SLIDE 1 — Angkor Wat ── --}}
                        <div class="hero-slide flex-shrink-0 w-full h-full relative">
                            {{-- Fallback BG --}}
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-900 to-blue-700
                                        flex items-center justify-center">
                                <i class="fa-solid fa-place-of-worship text-blue-300/20 text-9xl"></i>
                            </div>
                            {{-- Real image --}}
                            <img src="{{ asset('images/cambodia.jpg') }}"
                                 alt="Angkor Wat"
                                 class="absolute inset-0 w-full h-full object-cover"
                                 onerror="this.style.display='none'" />
                            {{-- Gradient overlay --}}
                            <div class="absolute inset-0"
                                 style="background: linear-gradient(to top,
                                        rgba(0,0,0,0.80) 0%,
                                        rgba(0,0,0,0.20) 50%,
                                        transparent 100%);">
                            </div>
                            {{-- Info --}}
                            <div class="absolute bottom-0 left-0 right-0 p-6 z-10">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="bg-blue-600 text-white text-xs font-bold
                                                 px-2.5 py-1 rounded-full">KH</span>
                                    <span class="text-white/60 text-xs">Religious · Siem Reap</span>
                                </div>
                                <h3 class="text-white font-title font-bold text-2xl leading-tight">
                                    Angkor Wat
                                </h3>
                                <p class="text-white/70 text-sm mt-1 line-clamp-2">
                                    World's largest religious monument & UNESCO World Heritage Site.
                                </p>
                                <div class="flex items-center gap-2 mt-3">
                                    <span class="text-yellow-400 text-sm">⭐⭐⭐⭐⭐</span>
                                    <span class="text-white/50 text-xs">Must Visit</span>
                                </div>
                            </div>
                        </div>

                        {{-- ── SLIDE 2 — Bayon Temple ── --}}
                        <div class="hero-slide flex-shrink-0 w-full h-full relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-indigo-900 to-blue-800
                                        flex items-center justify-center">
                                <i class="fa-solid fa-landmark text-blue-300/20 text-9xl"></i>
                            </div>
                            <img src="{{ asset('images/bayon-temple.jpg') }}"
                                 alt="Bayon Temple"
                                 class="absolute inset-0 w-full h-full object-cover"
                                 onerror="this.style.display='none'" />
                            <div class="absolute inset-0"
                                 style="background: linear-gradient(to top,
                                        rgba(0,0,0,0.80) 0%,
                                        rgba(0,0,0,0.20) 50%,
                                        transparent 100%);">
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 p-6 z-10">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="bg-blue-600 text-white text-xs font-bold
                                                 px-2.5 py-1 rounded-full">KH</span>
                                    <span class="text-white/60 text-xs">Religious · Angkor Thom</span>
                                </div>
                                <h3 class="text-white font-title font-bold text-2xl leading-tight">
                                    Bayon Temple
                                </h3>
                                <p class="text-white/70 text-sm mt-1 line-clamp-2">
                                    Famous for its 216 giant smiling stone faces on 54 towers.
                                </p>
                                <div class="flex items-center gap-2 mt-3">
                                    <span class="text-yellow-400 text-sm">⭐⭐⭐⭐⭐</span>
                                    <span class="text-white/50 text-xs">Must Visit</span>
                                </div>
                            </div>
                        </div>

                        {{-- ── SLIDE 3 — Royal Palace ── --}}
                        <div class="hero-slide flex-shrink-0 w-full h-full relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-800 to-cyan-900
                                        flex items-center justify-center">
                                <i class="fa-solid fa-crown text-blue-300/20 text-9xl"></i>
                            </div>
                            <img src="{{ asset('images/royal-palace.jpg') }}"
                                 alt="Royal Palace"
                                 class="absolute inset-0 w-full h-full object-cover"
                                 onerror="this.style.display='none'" />
                            <div class="absolute inset-0"
                                 style="background: linear-gradient(to top,
                                        rgba(0,0,0,0.80) 0%,
                                        rgba(0,0,0,0.20) 50%,
                                        transparent 100%);">
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 p-6 z-10">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="bg-blue-600 text-white text-xs font-bold
                                                 px-2.5 py-1 rounded-full">KH</span>
                                    <span class="text-white/60 text-xs">Historical · Phnom Penh</span>
                                </div>
                                <h3 class="text-white font-title font-bold text-2xl leading-tight">
                                    Royal Palace
                                </h3>
                                <p class="text-white/70 text-sm mt-1 line-clamp-2">
                                    The stunning royal residence of the King of Cambodia since 1866.
                                </p>
                                <div class="flex items-center gap-2 mt-3">
                                    <span class="text-yellow-400 text-sm">⭐⭐⭐⭐⭐</span>
                                    <span class="text-white/50 text-xs">Featured</span>
                                </div>
                            </div>
                        </div>

                        {{-- ── SLIDE 4 — Chocolate Hills ── --}}
                        <div class="hero-slide flex-shrink-0 w-full h-full relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-green-900 to-emerald-800
                                        flex items-center justify-center">
                                <i class="fa-solid fa-mountain text-green-300/20 text-9xl"></i>
                            </div>
                            <img src="{{ asset('images/chocolate-hills.jpg') }}"
                                 alt="Chocolate Hills"
                                 class="absolute inset-0 w-full h-full object-cover"
                                 onerror="this.style.display='none'" />
                            <div class="absolute inset-0"
                                 style="background: linear-gradient(to top,
                                        rgba(0,0,0,0.80) 0%,
                                        rgba(0,0,0,0.20) 50%,
                                        transparent 100%);">
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 p-6 z-10">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="bg-red-600 text-white text-xs font-bold
                                                 px-2.5 py-1 rounded-full">PH</span>
                                    <span class="text-white/60 text-xs">Natural · Bohol</span>
                                </div>
                                <h3 class="text-white font-title font-bold text-2xl leading-tight">
                                    Chocolate Hills
                                </h3>
                                <p class="text-white/70 text-sm mt-1 line-clamp-2">
                                    Over 1,200 cone-shaped hills that turn chocolate brown in summer.
                                </p>
                                <div class="flex items-center gap-2 mt-3">
                                    <span class="text-yellow-400 text-sm">⭐⭐⭐⭐⭐</span>
                                    <span class="text-white/50 text-xs">Must Visit</span>
                                </div>
                            </div>
                        </div>

                        {{-- ── SLIDE 5 — Intramuros ── --}}
                        <div class="hero-slide flex-shrink-0 w-full h-full relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-red-900 to-rose-800
                                        flex items-center justify-center">
                                <i class="fa-solid fa-city text-red-300/20 text-9xl"></i>
                            </div>
                            <img src="{{ asset('images/intramuros.jpg') }}"
                                 alt="Intramuros"
                                 class="absolute inset-0 w-full h-full object-cover"
                                 onerror="this.style.display='none'" />
                            <div class="absolute inset-0"
                                 style="background: linear-gradient(to top,
                                        rgba(0,0,0,0.80) 0%,
                                        rgba(0,0,0,0.20) 50%,
                                        transparent 100%);">
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 p-6 z-10">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="bg-red-600 text-white text-xs font-bold
                                                 px-2.5 py-1 rounded-full">PH</span>
                                    <span class="text-white/60 text-xs">Historical · Manila</span>
                                </div>
                                <h3 class="text-white font-title font-bold text-2xl leading-tight">
                                    Intramuros
                                </h3>
                                <p class="text-white/70 text-sm mt-1 line-clamp-2">
                                    The historic walled city — 400+ years of Philippine colonial history.
                                </p>
                                <div class="flex items-center gap-2 mt-3">
                                    <span class="text-yellow-400 text-sm">⭐⭐⭐⭐⭐</span>
                                    <span class="text-white/50 text-xs">Featured</span>
                                </div>
                            </div>
                        </div>

                        {{-- ── SLIDE 6 — Mayon Volcano ── --}}
                        <div class="hero-slide flex-shrink-0 w-full h-full relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-orange-900 to-red-800
                                        flex items-center justify-center">
                                <i class="fa-solid fa-volcano text-orange-300/20 text-9xl"></i>
                            </div>
                            <img src="{{ asset('images/mayon-volcano.jpg') }}"
                                 alt="Mayon Volcano"
                                 class="absolute inset-0 w-full h-full object-cover"
                                 onerror="this.style.display='none'" />
                            <div class="absolute inset-0"
                                 style="background: linear-gradient(to top,
                                        rgba(0,0,0,0.80) 0%,
                                        rgba(0,0,0,0.20) 50%,
                                        transparent 100%);">
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 p-6 z-10">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="bg-red-600 text-white text-xs font-bold
                                                 px-2.5 py-1 rounded-full">PH</span>
                                    <span class="text-white/60 text-xs">Natural · Albay, Bicol</span>
                                </div>
                                <h3 class="text-white font-title font-bold text-2xl leading-tight">
                                    Mayon Volcano
                                </h3>
                                <p class="text-white/70 text-sm mt-1 line-clamp-2">
                                    The "perfect cone" — most active volcano in the Philippines.
                                </p>
                                <div class="flex items-center gap-2 mt-3">
                                    <span class="text-yellow-400 text-sm">⭐⭐⭐⭐⭐</span>
                                    <span class="text-white/50 text-xs">Must Visit</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- END Slides --}}

                    {{-- ← Prev Button --}}
                    <button id="hero-prev"
                            class="absolute left-4 top-1/2 -translate-y-1/2 z-20
                                   w-10 h-10 bg-black/40 hover:bg-black/70 backdrop-blur-sm
                                   rounded-full flex items-center justify-center
                                   text-white transition border border-white/20">
                        <i class="fa-solid fa-chevron-left text-sm"></i>
                    </button>

                    {{-- → Next Button --}}
                    <button id="hero-next"
                            class="absolute right-4 top-1/2 -translate-y-1/2 z-20
                                   w-10 h-10 bg-black/40 hover:bg-black/70 backdrop-blur-sm
                                   rounded-full flex items-center justify-center
                                   text-white transition border border-white/20">
                        <i class="fa-solid fa-chevron-right text-sm"></i>
                    </button>

                    {{-- Country Tag --}}
                    <div class="absolute top-4 right-4 z-20">
                        <div id="hero-country-tag"
                             class="bg-black/40 backdrop-blur-sm border border-white/20
                                    rounded-full px-3 py-1.5 text-white text-xs font-semibold">
                            🇰🇭 Cambodia
                        </div>
                    </div>

                </div>
                {{-- END Main Slider --}}

                {{-- ── Dot Indicators ── --}}
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2" id="hero-dots">
                        @php
                        $heroSlides = [
                            ['label' => 'Angkor Wat',       'country' => 'KH', 'color' => 'bg-blue-500'],
                            ['label' => 'Bayon Temple',     'country' => 'KH', 'color' => 'bg-blue-500'],
                            ['label' => 'Royal Palace',     'country' => 'KH', 'color' => 'bg-blue-500'],
                            ['label' => 'Chocolate Hills',  'country' => 'PH', 'color' => 'bg-red-500'],
                            ['label' => 'Intramuros',       'country' => 'PH', 'color' => 'bg-red-500'],
                            ['label' => 'Mayon Volcano',    'country' => 'PH', 'color' => 'bg-red-500'],
                        ];
                        @endphp

                        @foreach($heroSlides as $i => $sl)
                        <button class="hero-dot rounded-full h-2 transition-all duration-300
                                       {{ $i === 0 ? $sl['color'].' w-6' : 'bg-white/30 w-2' }}"
                                data-index="{{ $i }}"
                                data-color="{{ $sl['color'] }}"
                                title="{{ $sl['label'] }}">
                        </button>
                        @endforeach
                    </div>

                    {{-- Swipe hint --}}
                    <p class="text-white/40 text-xs flex items-center gap-1.5 flex-shrink-0">
                        <i class="fa-solid fa-hand-pointer text-xs"></i>
                        Swipe or drag
                    </p>
                </div>

                {{-- Slide Label + Links --}}
                <div class="flex items-center justify-between">
                    <p id="hero-slide-label" class="text-white/60 text-xs font-semibold">
                        Angkor Wat — Cambodia
                    </p>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('country.show','cambodia') }}"
                           class="text-xs text-blue-300 hover:text-white transition font-semibold">
                            All KH →
                        </a>
                        <span class="text-white/20 text-xs">|</span>
                        <a href="{{ route('country.show','philippines') }}"
                           class="text-xs text-red-300 hover:text-white transition font-semibold">
                            All PH →
                        </a>
                    </div>
                </div>

            </div>
            {{-- ══ END RIGHT SIDE ══ --}}

        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex flex-col items-center
                gap-1.5 animate-bounce">
        <span class="text-white/40 text-xs">Scroll to explore</span>
        <i class="fa-solid fa-chevron-down text-white/40"></i>
    </div>
</section>



{{-- ══ FEATURED LANDMARKS — SWIPEABLE CAROUSEL ══ --}}
@if($featured->isNotEmpty())

@php
// Map slugs to images
$featuredImages = [
    // Cambodia Featured
    'angkor-wat'              => asset('images/landmarks/cambodia.jpg'),
    'royal-palace-phnom-penh' => asset('images/landmarks/royal-palace.jpg'),
    'ta-prohm-temple'         => asset('images/landmarks/ta-prohm-temple.jpg'),
    'banteay-srei'            => asset('images/landmarks/banteay-srei.jpg'),
    'tonle-sap-lake'          => asset('images/landmarks/tonle-sap-lake.jpg'),

    // Philippines Featured
    'intramuros'                        => asset('images/landmarks/intramuros.jpg'),
    'chocolate-hills'                   => asset('images/landmarks/chocolate-hills.jpg'),
    'puerto-princesa-underground-river' => asset('images/landmarks/puerto-princesa-underground-river.jpg'),
    'boracay'                           => asset('images/landmarks/boracay.jpg'),
    'mount-pinatubo'                    => asset('images/landmarks/mount-pinatubo.jpg'),
];
@endphp

<section class="py-20 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-end justify-between mb-10">
            <div>
                <p class="text-blue-600 font-mono text-xs font-bold tracking-widest uppercase mb-2">
                    
                </p>
                <h2 class="font-title font-bold text-4xl text-gray-900">Featured Places</h2>
                <p class="text-gray-500 mt-2">Handpicked landmarks you must explore</p>
            </div>
            <div class="flex items-center gap-3">
                <button id="prev-btn"
                        class="w-11 h-11 bg-gray-100 hover:bg-blue-600
                               rounded-full flex items-center justify-center transition group">
                    <i class="fa-solid fa-chevron-left text-sm text-gray-600 group-hover:text-white"></i>
                </button>
                <button id="next-btn"
                        class="w-11 h-11 bg-blue-600 hover:bg-blue-700 rounded-full
                               flex items-center justify-center transition">
                    <i class="fa-solid fa-chevron-right text-sm text-white"></i>
                </button>
            </div>
        </div>

        <div class="carousel-container" id="carousel-wrap">
            <div class="carousel-track" id="carousel-track">
                @foreach($featured as $lm)
                @php
                    $cardImg = $featuredImages[$lm->slug] ?? null;
                @endphp
                <div class="carousel-slide flex-shrink-0">
                    <a href="{{ route('landmark.show', $lm->slug) }}"
                       class="landmark-card block bg-white rounded-2xl overflow-hidden
                              border border-gray-100 shadow-sm group">

                        {{-- ══ IMAGE ══ --}}
                        <div class="h-56 relative overflow-hidden">

                            {{-- Fallback BG --}}
                            <div class="absolute inset-0 bg-gradient-to-br
                                        {{ $lm->country === 'cambodia'
                                           ? 'from-blue-100 to-blue-200'
                                           : 'from-slate-100 to-blue-100' }}
                                        flex items-center justify-center">
                                <i class="fa-solid fa-landmark text-6xl
                                          {{ $lm->country === 'cambodia'
                                             ? 'text-blue-200' : 'text-slate-300' }}"></i>
                            </div>

                            {{-- Real Image --}}
                            @if($cardImg)
                            <img src="{{ $cardImg }}"
                                 alt="{{ $lm->name }}"
                                 class="absolute inset-0 w-full h-full object-cover
                                        group-hover:scale-110 transition-transform duration-700"
                                 onerror="this.style.display='none'" />
                            @endif

                            {{-- Bottom gradient --}}
                            <div class="absolute bottom-0 left-0 right-0 h-20
                                        bg-gradient-to-t from-black/50 to-transparent z-10">
                            </div>

                            {{-- Country Badge --}}
                            <span class="absolute top-4 left-4 z-20 text-xs font-bold px-3 py-1
                                         rounded-full
                                         {{ $lm->country_code === 'KH'
                                            ? 'bg-blue-600 text-white'
                                            : 'bg-gray-800 text-white' }}">
                                {{ $lm->country_code }}
                            </span>

                            {{-- Category Badge --}}
                            <span class="absolute top-4 right-4 z-20 text-xs font-semibold px-3 py-1
                                         rounded-full cat-{{ strtolower($lm->category) }}">
                                {{ $lm->category }}
                            </span>

                            {{-- Featured Badge --}}
                            @if($lm->featured)
                            <span class="absolute bottom-3 left-4 z-20 text-xs bg-yellow-400
                                         text-yellow-900 font-bold px-2.5 py-1 rounded-full">
                                ⭐ Featured
                            </span>
                            @endif
                        </div>
                        {{-- ══ END IMAGE ══ --}}

                        <div class="p-5">
                            <h3 class="font-title font-bold text-gray-900 text-lg mb-1
                                       group-hover:text-blue-600 transition">
                                {{ $lm->name }}
                            </h3>
                            <p class="text-gray-500 text-sm flex items-center gap-1.5 mb-3">
                                <i class="fa-solid fa-location-dot text-blue-500 text-xs"></i>
                                {{ $lm->location }}
                            </p>
                            <p class="text-gray-600 text-sm line-clamp-2 leading-relaxed">
                                {{ $lm->description }}
                            </p>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-blue-600 text-sm font-semibold
                                             group-hover:underline flex items-center gap-1">
                                    View Details
                                    <i class="fa-solid fa-arrow-right text-xs
                                               group-hover:translate-x-1 transition-transform"></i>
                                </span>
                                <span class="text-xs text-gray-400">{{ ucfirst($lm->country) }}</span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        <div class="flex justify-center items-center gap-2 mt-8" id="dots-container">
            @foreach($featured as $i => $lm)
            <button class="dot h-2 w-2 rounded-full bg-gray-300 transition-all"
                    data-index="{{ $i }}"></button>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ══ EXPLORE COUNTRIES ══ --}}
<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-blue-600 font-mono text-xs font-bold tracking-widest uppercase mb-2">
                
            </p>
            <h2 class="font-title font-bold text-4xl text-gray-900">Choose Your Destination</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">

            {{-- Cambodia --}}
            <a href="{{ route('country.show', 'cambodia') }}"
               class="group relative rounded-3xl overflow-hidden shadow-lg
                      hover:shadow-2xl transition-all duration-500 block">
                <div class="h-72 relative" style="background: url('{{ asset('images/cambodia.jpg') }}')
                     center/cover no-repeat;">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-900/80 to-blue-700/50"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 text-white z-10">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="bg-blue-600 text-white text-sm font-bold px-3 py-1 rounded-full">KH</span>
                            <span class="text-white/70 text-sm">4 Landmarks</span>
                        </div>
                        <h3 class="font-title font-extrabold text-4xl mb-1">Cambodia</h3>
                        <p class="text-white/70 text-sm">Angkor Wat, Bayon Temple & more</p>
                    </div>
                    <div class="absolute top-6 right-6 z-10 w-10 h-10 bg-white/20 rounded-full
                                flex items-center justify-center group-hover:bg-white/30
                                group-hover:scale-110 transition-all">
                        <i class="fa-solid fa-arrow-right text-white text-sm"></i>
                    </div>
                    {{-- Fallback if no image --}}
                    <div class="absolute inset-0 -z-10 bg-gradient-to-br from-blue-900 to-blue-600
                                flex items-center justify-center">
                        <i class="fa-solid fa-landmark text-blue-300/20 text-9xl"></i>
                    </div>
                </div>
            </a>

            {{-- Philippines --}}
            <a href="{{ route('country.show', 'philippines') }}"
               class="group relative rounded-3xl overflow-hidden shadow-lg
                      hover:shadow-2xl transition-all duration-500 block">
                <div class="h-72 relative" style="background: url('{{ asset('images/philippines.jpg') }}')
                     center/cover no-repeat;">
                    <div class="absolute inset-0 bg-gradient-to-br from-red-900/80 to-red-700/50"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 text-white z-10">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="bg-red-600 text-white text-sm font-bold px-3 py-1 rounded-full">PH</span>
                            <span class="text-white/70 text-sm">4 Landmarks</span>
                        </div>
                        <h3 class="font-title font-extrabold text-4xl mb-1">Philippines</h3>
                        <p class="text-white/70 text-sm">Intramuros, Chocolate Hills & more</p>
                    </div>
                    <div class="absolute top-6 right-6 z-10 w-10 h-10 bg-white/20 rounded-full
                                flex items-center justify-center group-hover:bg-white/30
                                group-hover:scale-110 transition-all">
                        <i class="fa-solid fa-arrow-right text-white text-sm"></i>
                    </div>
                    <div class="absolute inset-0 -z-10 bg-gradient-to-br from-red-900 to-red-600
                                flex items-center justify-center">
                        <i class="fa-solid fa-mountain text-red-300/20 text-9xl"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>

{{-- ══ DID YOU KNOW ══ --}}
@if($funFact)
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-6">
        <div class="bg-gradient-to-br from-blue-900 via-blue-700 to-blue-600 rounded-3xl
                    p-10 text-white relative overflow-hidden shadow-2xl shadow-blue-900/30">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full
                        -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-40 h-40 bg-white/5 rounded-full
                        translate-y-1/2 -translate-x-1/2"></div>
            <div class="relative flex items-start gap-6">
                <div class="w-16 h-16 bg-white/15 rounded-2xl flex items-center justify-center
                            flex-shrink-0 text-3xl">💡</div>
                <div class="flex-1">
                    <p class="font-mono text-blue-300 text-xs font-bold tracking-widest uppercase mb-3">
                        
                    </p>
                    <h3 class="font-title font-bold text-2xl mb-3">{{ $funFact->name }}</h3>
                    <p class="text-white/75 leading-relaxed text-base">{{ $funFact->fun_fact }}</p>
                    <a href="{{ route('landmark.show', $funFact->slug) }}"
                       class="inline-flex items-center gap-2 mt-5 bg-white/15 hover:bg-white/25
                              text-white text-sm font-semibold px-5 py-2.5 rounded-full transition">
                        Learn more <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@endsection

@push('scripts')
<script>
// ══════════════════════════════════════
// HERO SLIDER — Right Side
// ══════════════════════════════════════
(function () {
    const slider  = document.getElementById('hero-slider');
    const dots    = document.querySelectorAll('.hero-dot');
    const prevBtn = document.getElementById('hero-prev');
    const nextBtn = document.getElementById('hero-next');
    const counter = document.getElementById('hero-current');
    const label   = document.getElementById('hero-slide-label');
    const tag     = document.getElementById('hero-country-tag');

    const slideData = [
        { label: 'Angkor Wat — Cambodia',        country: '🇰🇭 Cambodia',    color: 'bg-blue-500' },
        { label: 'Bayon Temple — Cambodia',       country: '🇰🇭 Cambodia',    color: 'bg-blue-500' },
        { label: 'Royal Palace — Cambodia',       country: '🇰🇭 Cambodia',    color: 'bg-blue-500' },
        { label: 'Chocolate Hills — Philippines', country: '🇵🇭 Philippines', color: 'bg-red-500'  },
        { label: 'Intramuros — Philippines',      country: '🇵🇭 Philippines', color: 'bg-red-500'  },
        { label: 'Mayon Volcano — Philippines',   country: '🇵🇭 Philippines', color: 'bg-red-500'  },
    ];

    let current = 0;
    const total = slideData.length;

    function heroGoTo(index) {
        if (index < 0)      index = total - 1;
        if (index >= total) index = 0;
        current = index;

        // Move slider
        slider.style.transform = `translateX(-${current * 100}%)`;

        // Counter
        if (counter) counter.textContent = current + 1;

        // Label
        if (label) label.textContent = slideData[current].label;

        // Country tag
        if (tag) tag.textContent = slideData[current].country;

        // Dots
        dots.forEach((dot, i) => {
            dot.classList.remove('bg-blue-500','bg-red-500','bg-white/30','w-6','w-2');
            if (i === current) {
                dot.classList.add(slideData[i].color, 'w-6');
            } else {
                dot.classList.add('bg-white/30', 'w-2');
            }
        });
    }

    // Buttons
    if (prevBtn) prevBtn.addEventListener('click', () => heroGoTo(current - 1));
    if (nextBtn) nextBtn.addEventListener('click', () => heroGoTo(current + 1));

    // Dots
    dots.forEach((dot, i) => dot.addEventListener('click', () => heroGoTo(i)));

    // Touch swipe
    let touchStartX = 0;
    if (slider) {
        slider.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].clientX;
        }, { passive: true });

        slider.addEventListener('touchend', e => {
            const diff = touchStartX - e.changedTouches[0].clientX;
            if (Math.abs(diff) > 50) heroGoTo(diff > 0 ? current + 1 : current - 1);
        });

        // Mouse drag
        let isDragging = false;
        let dragStartX = 0;

        slider.addEventListener('mousedown', e => {
            isDragging = true;
            dragStartX = e.clientX;
            slider.style.cursor = 'grabbing';
        });
        slider.addEventListener('mouseup', e => {
            if (!isDragging) return;
            isDragging = false;
            slider.style.cursor = 'grab';
            const diff = dragStartX - e.clientX;
            if (Math.abs(diff) > 50) heroGoTo(diff > 0 ? current + 1 : current - 1);
        });
        slider.addEventListener('mouseleave', () => {
            isDragging = false;
            slider.style.cursor = 'grab';
        });
        slider.style.cursor = 'grab';
    }

    // Auto-play
    const sliderWrap = slider?.parentElement;
    let autoPlay = setInterval(() => heroGoTo(current + 1), 4500);

    if (sliderWrap) {
        sliderWrap.addEventListener('mouseenter', () => clearInterval(autoPlay));
        sliderWrap.addEventListener('mouseleave', () => {
            autoPlay = setInterval(() => heroGoTo(current + 1), 4500);
        });
    }

    // Init
    heroGoTo(0);
})();


// ══════════════════════════════════════
// FEATURED CAROUSEL — Bottom Section
// ══════════════════════════════════════
(function () {
    const track   = document.getElementById('carousel-track');
    const wrap    = document.getElementById('carousel-wrap');
    const dots    = document.querySelectorAll('.dot');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');

    if (!track || !wrap) return;

    let current  = 0;
    let total    = dots.length;
    let perView  = 3;
    let maxIndex = Math.max(0, total - perView);

    function getPerView() {
        if (window.innerWidth < 768)  return 1;
        if (window.innerWidth < 1024) return 2;
        return 3;
    }

    function getSlideWidth() {
        const slides = document.querySelectorAll('.carousel-slide');
        if (!slides.length) return 0;
        return slides[0].offsetWidth + 24;
    }

    function carouselGoTo(index) {
        perView  = getPerView();
        maxIndex = Math.max(0, total - perView);
        current  = Math.max(0, Math.min(index, maxIndex));

        track.style.transform = `translateX(-${current * getSlideWidth()}px)`;

        dots.forEach((d, i) => {
            d.classList.toggle('active',    i === current);
            d.classList.toggle('bg-blue-600', i === current);
            d.classList.toggle('bg-gray-300', i !== current);
        });
    }

    if (prevBtn) prevBtn.addEventListener('click', () => carouselGoTo(current - 1));
    if (nextBtn) nextBtn.addEventListener('click', () => carouselGoTo(current + 1));
    dots.forEach((dot, i) => dot.addEventListener('click', () => carouselGoTo(i)));

    let cAuto = setInterval(() => carouselGoTo(current + 1 > maxIndex ? 0 : current + 1), 4000);
    wrap.addEventListener('mouseenter', () => clearInterval(cAuto));
    wrap.addEventListener('mouseleave', () => {
        cAuto = setInterval(() => carouselGoTo(current + 1 > maxIndex ? 0 : current + 1), 4000);
    });

    let cStartX = 0;
    track.addEventListener('touchstart', e => cStartX = e.touches[0].clientX, { passive: true });
    track.addEventListener('touchend', e => {
        const diff = cStartX - e.changedTouches[0].clientX;
        if (Math.abs(diff) > 50) carouselGoTo(diff > 0 ? current + 1 : current - 1);
    });

    window.addEventListener('resize', () => carouselGoTo(0));
    carouselGoTo(0);
})();
</script>
@endpush
