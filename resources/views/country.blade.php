@extends('layouts.app')
@section('title', $countryName . ' — Cultural Landmark Explorer')

@section('content')

@php
    $isKH      = $country === 'cambodia';
    $heroImage = $isKH
        ? asset('images/cambodia.jpg')
        : asset('images/philippines.jpg');

    // Map landmark slug to image
    $landmarkImages = [
        // Cambodia
        'angkor-wat'              => asset('images/landmarks/cambodia.jpg'),
        'bayon-temple'            => asset('images/landmarks/bayon-temple.jpg'),
        'royal-palace-phnom-penh' => asset('images/landmarks/royal-palace.jpg'),
        'phnom-kulen'             => asset('images/landmarks/phnom-kulen.jpg'),
// Cambodia — New Historical
'tuol-sleng-museum'          => asset('images/landmarks/tuol-sleng-museum.jpg'),
'ta-prohm-temple'            => asset('images/landmarks/ta-prohm-temple.jpg'),
'sambor-prei-kuk'            => asset('images/landmarks/sambor-prei-kuk.jpg'),
'preah-vihear-temple'        => asset('images/landmarks/preah-vihear-temple.jpg'),
'phnom-bakheng-temple'       => asset('images/landmarks/phnom-bakheng.jpg'),
'national-museum-cambodia'   => asset('images/landmarks/national-museum-cambodia.jpg'),
'koh-ker'                    => asset('images/landmarks/koh-ker.jpg'),
'independence-monument'      => asset('images/landmarks/independence-monument.jpg'),
'choeng-ek-killing-fields'   => asset('images/landmarks/choeng-ek.jpg'),
'beng-mealea-temple'         => asset('images/landmarks/beng-mealea.jpg'),
'banteay-srei'               => asset('images/landmarks/banteay-srei.jpg'),
'banteay-samre'              => asset('images/landmarks/banteay-samre.jpg'),
'banteay-chhmar'             => asset('images/landmarks/banteay-chhmar.jpg'),

// Cambodia — New Natural
'tonle-sap-lake'             => asset('images/landmarks/tonle-sap-lake.jpg'),
'irrawaddy-dolphin-pools-kratie' => asset('images/landmarks/irrawaddy-dolphins.jpeg'),
'sok-san-beach'              => asset('images/landmarks/sok-san-beach.jpg'),
'phnom-sampov-mountain'      => asset('images/landmarks/phnom-sampov.jpg'),
'ream-national-park'         => asset('images/landmarks/ream-national-park.jpg'),
'ratanakiri-province'        => asset('images/landmarks/ratanakiri.jpg'),
'prek-toal-bird-sanctuary'   => asset('images/landmarks/prek-toal.jpg'),
'phnom-chhngok-cave-temple'  => asset('images/landmarks/phnom-chhngok.jpg'),
'peam-krasop-mangrove-sanctuary' => asset('images/landmarks/peam-krasop.jpg'),
'otres-beach'                => asset('images/landmarks/otres-beach.jpg'),
'mondulkiri'                 => asset('images/landmarks/mondulkiri.jpg'),
'koh-rong-sanloem'           => asset('images/landmarks/koh-rong-sanloem.jpeg'),
'koh-rong-island'            => asset('images/landmarks/koh-rong-island.jpg'),
'kirirom-national-park'      => asset('images/landmarks/kirirom-national-park.jpg'),
'kep-national-park'          => asset('images/landmarks/kep-national-park.jpg'),
'bousra-waterfall'           => asset('images/landmarks/bousra-waterfall.jpeg'),
'battambang-bat-caves'       => asset('images/landmarks/battambang-bat-caves.jpg'),

// Cambodia — New Religious
'wat-vihear-suor'            => asset('images/landmarks/wat-vihear-suor.jpg'),
'wat-preah-prom-rath'        => asset('images/landmarks/wat-preah-prom-rath.jpg'),
'wat-ounalom'                => asset('images/landmarks/wat-ounalom.jpg'),
'wat-preah-keo-morakot'      => asset('images/landmarks/silver-pagoda.jpeg'),
'phnom-oudong'               => asset('images/landmarks/phnom-oudong.jpg'),
'visak-bochea-festival'      => asset('images/landmarks/visak-bochea.jpg'),
'pchum-ben-festival'         => asset('images/landmarks/pchum-ben.jpg'),
'bon-om-touk-festival'       => asset('images/landmarks/bon-om-touk.jpg'),
'buddhist-monks-cambodia'    => asset('images/landmarks/buddhist-monks.jpg'),

        // PH Historical
        'intramuros'              => asset('images/landmarks/intramuros.jpg'),
        'rizal-park'              => asset('images/landmarks/rizal-park.jpg'),
        'fort-santiago'           => asset('images/landmarks/fort-santiago.jpg'),
        'corregidor-island'       => asset('images/landmarks/corregidor-island.jpeg'),
        'rizal-shrine'            => asset('images/landmarks/rizal-shrine.jpg'),
        'calle-crisologo-vigan'   => asset('images/landmarks/calle-crisologo.jpg'),
        'fort-san-pedro'          => asset('images/landmarks/fort-san-pedro.jpg'),
        'fort-pilar'              => asset('images/landmarks/fort-pilar.jpg'),
        'magellans-cross'         => asset('images/landmarks/magellans-cross.jpg'),
        'aguinaldo-shrine'        => asset('images/landmarks/aguinaldo-shrine.jpg'),
        'plaza-cuartel'             => asset('images/landmarks/plaza-cuartel.jpg'),
'guisi-lighthouse'          => asset('images/landmarks/guisi-lighthouse.jpg'),
'biak-na-bato-national-park'=> asset('images/landmarks/biak-na-bato.jpg'),
'binondo-chinatown'         => asset('images/landmarks/binondo-chinatown.jpg'),
'leyte-landing-memorial'    => asset('images/landmarks/leyte-landing-memorial.jpg'),
'mount-samat-national-shrine'=> asset('images/landmarks/mount-samat-shrine.jpg'),

        // PH Natural
        'chocolate-hills'                   => asset('images/landmarks/chocolate-hills.jpg'),
        'mayon-volcano'                     => asset('images/landmarks/mayon-volcano.jpg'),
        'boracay'                           => asset('images/landmarks/boracay.jpg'),
        'puerto-princesa-underground-river' => asset('images/landmarks/puerto-princesa-underground-river.jpg'),
        'banaue-rice-terraces'              => asset('images/landmarks/banaue-rice-terraces.jpg'),
        'siargao-island'                    => asset('images/landmarks/siargao-island.jpg'),
        'mount-pinatubo'            => asset('images/landmarks/mount-pinatubo.jpg'),
'osmena-peak'               => asset('images/landmarks/osmena-peak.jpg'),
'hundred-islands-national-park' => asset('images/landmarks/hundred-islands.jpg'),
'asik-asik-falls'           => asset('images/landmarks/asik-asik-falls.jpg'),
'barracuda-lake'            => asset('images/landmarks/barracuda-lake.jpg'),
'magpupungko-rock-pools'    => asset('images/landmarks/magpupungko-rock-pools.jpg'),
'biri-island-rock-formations'=> asset('images/landmarks/biri-rock-formations.jpg'),
'sabtang-batanes-island'    => asset('images/landmarks/sabtang-batanes.jpg'),
        'kayangan-lake'                     => asset('images/landmarks/kayangan-lake.jpg'),
        'hinatuan-enchanted-river'          => asset('images/landmarks/hinatuan-enchanted-river.jpg'),
        'tinago-falls'                      => asset('images/landmarks/tinago-falls.jpeg'),
        'maria-cristina-falls'              => asset('images/landmarks/maria-cristina-falls.jpeg'),
        'camiguin-island'                   => asset('images/landmarks/camiguin-island.jpeg'),
        'bong-bato-peak'                    => asset('images/landmarks/bong-bato-peak.jpg'),
        'tubbataha-reef-natural-park'       => asset('images/landmarks/tubbataha-reef.jpg'),

        // PH Religious
        'san-agustin-church'           => asset('images/landmarks/san-agustin-church.jpg'),
        'paoay-church'                 => asset('images/landmarks/paoay-church.jpg'),
        'taal-basilica'                => asset('images/landmarks/taal-basilica.jpg'),
        'basilica-del-santo-nino'      => asset('images/landmarks/basilica-del-santo-nino.jpg'),
        'grand-mosque-of-cotabato'     => asset('images/landmarks/grand-mosque-cotabato.jpg'),
        'shrine-holy-infant-jesus'     => asset('images/landmarks/shrine-holy-infant-jesus.jpg'),
        'barasoain-church'             => asset('images/landmarks/barasoain-church.jpg'),
        'national-shrine-padre-pio'    => asset('images/landmarks/national-shrine-padre-pio.jpg'),
        'callao-cave-chapel'           => asset('images/landmarks/callao-cave-chapel.jpeg'),
        'tamayong-prayer-mountain'     => asset('images/landmarks/tamayong-prayer-mountain.jpeg'),
        'abbey-of-the-transfiguration' => asset('images/landmarks/abbey-transfiguration.jpg'),
    ];
@endphp

{{-- ══ HERO WITH IMAGE BACKGROUND ══ --}}
<div class="country-hero min-h-[42vh] flex flex-col justify-end relative"
     style="background-image: url('{{ $heroImage }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;">

    {{-- Dark overlay --}}
    <div class="absolute inset-0"
         style="background: linear-gradient(
             to right,
             rgba(15, 23, 42, 0.65) 0%,
             rgba(15, 23, 42, 0.40) 55%,
             rgba(15, 23, 42, 0.10) 100%
         );">
    </div>

    {{-- Content --}}
    <div class="relative z-10 max-w-7xl mx-auto px-6 pb-12 pt-24 w-full">

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-white/60 text-sm mb-6">
            <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
            <i class="fa-solid fa-chevron-right text-xs"></i>
            <span class="text-white font-medium">{{ $countryName }}</span>
        </nav>

        {{-- Country Title --}}
<div class="flex items-center gap-5 mb-6">

    {{-- Flag Image --}}
    <div class="w-20 h-20 rounded-2xl overflow-hidden
                border-2 border-white/30 flex-shrink-0 shadow-lg">
        <img src="{{ $isKH
                    ? asset('images/flag.cambodia.png')
                    : asset('images/flag.philippines.png') }}"
             alt="{{ $countryName }} Flag"
             class="w-full h-full object-cover" />
    </div>

    <div>
        <h1 class="font-title font-extrabold text-white text-5xl leading-none mb-2">
            {{ $countryName }}
        </h1>
        <p class="text-white/70 text-base">
            {{ $landmarks->total() }} landmark{{ $landmarks->total() !== 1 ? 's' : '' }} found
        </p>
    </div>
</div>

        {{-- SEARCH BAR --}}
        <form action="{{ route('country.show', $country) }}" method="GET"
              class="flex gap-3 max-w-xl">
            <div class="flex-1 relative">
                <input type="text" name="search"
                       value="{{ request('search') }}"
                       placeholder="Search {{ $countryName }} landmarks..."
                       class="w-full bg-white/20 backdrop-blur-sm text-white placeholder-white/60
                              border border-white/30 rounded-full px-5 py-3 text-sm
                              focus:outline-none focus:bg-white/30 focus:border-white/60 transition" />
                <button type="submit"
                        class="absolute right-4 top-1/2 -translate-y-1/2
                               text-white/70 hover:text-white">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
            @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}" />
            @endif
        </form>
    </div>
</div>

{{-- ══ FILTER BAR ══ --}}
<div class="bg-white border-b border-gray-100 shadow-sm sticky top-16 z-40">
    <div class="max-w-7xl mx-auto px-6 py-4">
        <div class="flex flex-wrap items-center gap-3">

            <span class="text-gray-400 text-sm flex items-center gap-1.5">
                <i class="fa-solid fa-filter text-xs"></i> Filter:
            </span>

            {{-- All --}}
            <a href="{{ route('country.show', $country) }}"
               class="filter-pill px-5 py-2 rounded-full text-sm font-semibold transition
                      {{ !$category
                         ? 'bg-blue-600 text-white shadow-md shadow-blue-200'
                         : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                All
            </a>

            {{-- Category filters --}}
            @foreach($categories as $cat)
            <a href="{{ route('country.show', $country) }}?category={{ $cat }}"
               class="filter-pill px-5 py-2 rounded-full text-sm font-semibold transition
                      {{ $category === $cat
                         ? 'bg-blue-600 text-white shadow-md shadow-blue-200'
                         : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                {{ $cat }}
            </a>
            @endforeach

            {{-- ✅ Tour Guide Button — Both Countries --}}
            
<button onclick="openTourGuide()"
                    class="filter-pill px-5 py-2 rounded-full text-sm font-semibold
                           transition bg-gradient-to-r from-blue-600 to-blue-700
                           text-white hover:from-blue-700 hover:to-blue-800
                           shadow-md shadow-blue-200 flex items-center gap-2">
                <i class="fa-solid fa-map-location-dot text-xs"></i>
                Tour Guide
            </button>
            
            {{-- Switch Country --}}
            <div class="ml-auto">
                @if($isKH)
                <a href="{{ route('country.show','philippines') }}"
                   class="text-sm text-blue-600 hover:text-blue-700 font-semibold
                          flex items-center gap-1.5 transition">
                    Switch to Philippines
                    <span class="text-xs bg-blue-50 px-1.5 py-0.5 rounded font-bold">PH</span>
                    <i class="fa-solid fa-right-left text-xs"></i>
                </a>
                @else
                <a href="{{ route('country.show','cambodia') }}"
                   class="text-sm text-blue-600 hover:text-blue-700 font-semibold
                          flex items-center gap-1.5 transition">
                    Switch to Cambodia
                    <span class="text-xs bg-blue-50 px-1.5 py-0.5 rounded font-bold">KH</span>
                    <i class="fa-solid fa-right-left text-xs"></i>
                </a>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- ══ LANDMARK GRID ══ --}}
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-6 py-12">
        {{-- SKELETON LOADING --}}
<div id="skeleton-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7 mb-12">
    @for($i = 0; $i < 6; $i++)
    <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100">
        <div class="h-56 skeleton"></div>
        <div class="p-6 space-y-3">
            <div class="h-5 skeleton w-3/4"></div>
            <div class="h-4 skeleton w-1/2"></div>
            <div class="h-4 skeleton w-full"></div>
            <div class="h-4 skeleton w-5/6"></div>
            <div class="h-px bg-gray-100 mt-4"></div>
            <div class="flex justify-between pt-2">
                <div class="h-4 skeleton w-24"></div>
                <div class="h-4 skeleton w-16"></div>
            </div>
        </div>
    </div>
    @endfor
</div>

{{-- ACTUAL CONTENT (hidden initially) --}}
<div id="actual-content" class="hidden">

        @if($landmarks->isEmpty())
            <div class="text-center py-28 bg-white rounded-3xl shadow-sm border border-gray-100">
                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center
                            justify-center mx-auto mb-5">
                    <i class="fa-solid fa-landmark text-3xl text-gray-300"></i>
                </div>
                <p class="text-gray-500 text-lg font-medium mb-2">No landmarks found</p>
                <p class="text-gray-400 text-sm mb-6">Try a different filter or search term</p>
                <a href="{{ route('country.show', $country) }}"
                   class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-2.5
                          rounded-full text-sm font-semibold hover:bg-blue-700 transition">
                    Clear filters
                </a>
            </div>

        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7">
                @foreach($landmarks as $lm)
                <a href="{{ route('landmark.show', $lm->slug) }}"
                   class="landmark-card bg-white rounded-2xl overflow-hidden shadow-sm
                          group block border border-gray-100">

                    {{-- ══ IMAGE AREA ══ --}}
                    <div class="h-56 relative overflow-hidden">

                        {{-- Fallback gradient background --}}
                        <div class="absolute inset-0 bg-gradient-to-br
                                    {{ $isKH
                                       ? 'from-blue-100 to-blue-200'
                                       : 'from-slate-100 to-blue-100' }}
                                    flex items-center justify-center">
                            <i class="fa-solid fa-landmark text-5xl
                                      {{ $isKH ? 'text-blue-300' : 'text-slate-300' }}"></i>
                        </div>

                        {{-- Real Image --}}
                        @php $imgSrc = $landmarkImages[$lm->slug] ?? null; @endphp

                        @if($imgSrc)
                        <img src="{{ $imgSrc }}"
                             alt="{{ $lm->name }}"
                             class="absolute inset-0 w-full h-full object-cover
                                    group-hover:scale-110 transition-transform duration-700"
                             onerror="this.style.display='none'" />
                        @endif

                        {{-- Bottom gradient overlay --}}
                        <div class="absolute bottom-0 left-0 right-0 h-24
                                    bg-gradient-to-t from-black/50 to-transparent z-10">
                        </div>

                        {{-- Country Badge --}}
                        <span class="absolute top-4 left-4 z-20 text-xs font-bold px-2.5 py-1
                                     rounded-full
                                     {{ $lm->country_code === 'KH'
                                        ? 'bg-blue-600 text-white'
                                        : 'bg-gray-800 text-white' }}">
                            {{ $lm->country_code }}
                        </span>

                        {{-- Category Badge --}}
                        <span class="absolute top-4 right-4 z-20 text-xs font-semibold px-3 py-1
                                     rounded-full cat-{{ strtolower($lm->category) }}
                                     backdrop-blur-sm">
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
                    {{-- ══ END IMAGE AREA ══ --}}

                    {{-- Info --}}
                    <div class="p-6">
                        <div class="flex items-start justify-between gap-2 mb-2">
                            <h3 class="font-title font-bold text-gray-900 text-lg leading-tight
                                       group-hover:text-blue-600 transition">
                                {{ $lm->name }}
                            </h3>
                        </div>

                        <p class="text-gray-500 text-sm flex items-center gap-1.5 mb-3">
                            <i class="fa-solid fa-location-dot text-blue-500 text-xs"></i>
                            {{ $lm->location }}
                        </p>

                        <p class="text-gray-600 text-sm line-clamp-2 leading-relaxed mb-4">
                            {{ $lm->description }}
                        </p>

                        <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                            <span class="text-blue-600 text-sm font-semibold flex items-center
                                         gap-1 group-hover:gap-2 transition-all">
                                View Details
                                <i class="fa-solid fa-arrow-right text-xs"></i>
                            </span>
                            <div class="flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full
                                             {{ $lm->category === 'Historical' ? 'bg-blue-400'
                                                : ($lm->category === 'Natural'  ? 'bg-green-400'
                                                : 'bg-purple-400') }}">
                                </span>
                                <span class="text-gray-400 text-xs">{{ $lm->category }}</span>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

            @if($landmarks->hasPages())
            <div class="mt-12 flex justify-center">
                {{ $landmarks->links() }}
            </div>
            @endif
        @endif
    </div>
</div>

{{-- ══════════════════════════════════════════ --}}
{{-- TOUR GUIDE MODAL — Philippines Only       --}}
{{-- ══════════════════════════════════════════ --}}
<div id="tourGuideModal"
     class="fixed inset-0 z-50 hidden items-center justify-center p-4"
     style="background: rgba(0,0,0,0.65); backdrop-filter: blur(6px);">

    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-4xl
                max-h-[90vh] overflow-y-auto relative">

        {{-- Modal Header --}}
<div class="sticky top-0 bg-white z-10 px-8 py-6 border-b border-gray-100
            rounded-t-3xl flex items-center justify-between">
    <div>
        <p class="text-blue-600 font-mono text-xs font-bold tracking-widest uppercase mb-1">
            
        </p>
        <h2 class="font-title font-bold text-2xl text-gray-900">
            {{ $isKH ? '🇰🇭' : '🇵🇭' }} Meet Your Tour Guides
        </h2>
        <p class="text-gray-500 text-sm mt-1">
            Our team ready to guide you around {{ $countryName }}!
        </p>
    </div>
    <button onclick="closeTourGuide()"
            class="w-10 h-10 bg-gray-100 hover:bg-gray-200 rounded-full
                   flex items-center justify-center transition flex-shrink-0 ml-4">
        <i class="fa-solid fa-xmark text-gray-600"></i>
    </button>
</div>

        {{-- ── Members Grid ── --}}
        <div class="p-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
@if($isKH)
        {{-- ══ CAMBODIA MEMBERS ══ --}}

        {{-- KH Member 1 --}}
        <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl p-6
                    border border-blue-100 hover:shadow-lg transition">
            <div class="w-24 h-24 rounded-full overflow-hidden mx-auto mb-4s
                        border-4 border-white shadow-lg ring-2 ring-blue-100">
                <img src="{{ asset('images/members/savy.jpg') }}"
                     alt="KH Member 1"
                     class="w-full h-full object-cover"
                     onerror="this.src='https://ui-avatars.com/api/?name=KH+Member&background=1D4ED8&color=fff&size=96&bold=true'" />
            </div>
            <div class="text-center mb-5">
                <h3 class="font-title font-bold text-gray-900 text-lg">Savy Devith</h3>
                <p class="text-blue-600 text-xs font-semibold mt-1">🇰🇭 Cambodia Guide</p>
                <p class="text-gray-400 text-xs mt-0.5">Angkor Temple Expert</p>
            </div>
            <div class="flex flex-col gap-2">
                <a href=" https://www.facebook.com/share/1GxBTrhnbD/?mibextid=wwXIfr" target="_blank"
                   class="flex items-center gap-3 bg-blue-600 hover:bg-blue-700
                          text-white text-sm font-medium px-4 py-2.5 rounded-xl transition">
                    <i class="fa-brands fa-facebook w-4 text-center"></i> Facebook
                </a>
                <a href="https://t.me/devid_oe" target="_blank"
                   class="flex items-center gap-3 bg-sky-500 hover:bg-sky-600
                          text-white text-sm font-medium px-4 py-2.5 rounded-xl transition">
                    <i class="fa-brands fa-telegram w-4 text-center"></i> Telegram
                </a>
            </div>
        </div>

        {{-- KH Member 2 --}}
        <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl p-6
                    border border-blue-100 hover:shadow-lg transition">
            <div class="w-24 h-24 rounded-full overflow-hidden mx-auto mb-4
                        border-4 border-white shadow-lg ring-2 ring-blue-100">
                <img src="{{ asset('images/members/chin.jpg') }}"
                     alt="KH Member 2"
                     class="w-full h-full object-cover"
                     onerror="this.src='https://ui-avatars.com/api/?name=KH+Guide&background=1D4ED8&color=fff&size=96&bold=true'" />
            </div>
            <div class="text-center mb-5">
                <h3 class="font-title font-bold text-gray-900 text-lg">Chin Kaknika</h3>
                <p class="text-blue-600 text-xs font-semibold mt-1">🇰🇭 Cambodia Guide</p>
                <p class="text-gray-400 text-xs mt-0.5">Cultural Heritage Specialist</p>
            </div>
            <div class="flex flex-col gap-2">
                <a href="https://www.facebook.com/share/1GsjWFnbvb/" target="_blank"
                   class="flex items-center gap-3 bg-blue-600 hover:bg-blue-700
                          text-white text-sm font-medium px-4 py-2.5 rounded-xl transition">
                    <i class="fa-brands fa-facebook w-4 text-center"></i> Facebook
                </a>
                <a href="https://www.instagram.com/chinkaknika?igsh=dWZjdXJqODB5bDc5" target="_blank"
                   class="flex items-center gap-3 text-white text-sm font-medium
                          px-4 py-2.5 rounded-xl hover:opacity-90 transition"
                   style="background:linear-gradient(45deg,#f09433,#e6683c,#dc2743,#cc2366,#bc1888);">
                    <i class="fa-brands fa-instagram w-4 text-center"></i> Instagram
                </a>
                <a href="https://t.me/Chinkaknika" target="_blank"
                   class="flex items-center gap-3 bg-sky-500 hover:bg-sky-600
                          text-white text-sm font-medium px-4 py-2.5 rounded-xl transition">
                    <i class="fa-brands fa-telegram w-4 text-center"></i> Telegram
                </a>
            </div>
        </div>

        {{-- KH Member 3 --}}
        <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl p-6
                    border border-blue-100 hover:shadow-lg transition">
            <div class="w-24 h-24 rounded-full overflow-hidden mx-auto mb-4
                        border-4 border-white shadow-lg ring-2 ring-blue-100">
                <img src="{{ asset('images/members/thor.png') }}"
                     alt="KH Member 3"
                     class="w-full h-full object-cover"
                     onerror="this.src='https://ui-avatars.com/api/?name=KH+Expert&background=1D4ED8&color=fff&size=96&bold=true'" />
            </div>
            <div class="text-center mb-5">
                <h3 class="font-title font-bold text-gray-900 text-lg">Thorng Dy</h3>
                <p class="text-blue-600 text-xs font-semibold mt-1">🇰🇭 Cambodia Guide</p>
                <p class="text-gray-400 text-xs mt-0.5">Nature & Wildlife Expert</p>
            </div>
            <div class="flex flex-col gap-2">
                <a href="https://www.facebook.com/share/1KuudKF9Qb/ " target="_blank"
                   class="flex items-center gap-3 bg-blue-600 hover:bg-blue-700
                          text-white text-sm font-medium px-4 py-2.5 rounded-xl transition">
                    <i class="fa-brands fa-facebook w-4 text-center"></i> Facebook
                </a>
                <a href="https://www.instagram.com/thorng.dy.3990?igsh=MTRvOTg5b25nc2FvZw==" target="_blank"
                   class="flex items-center gap-3 text-white text-sm font-medium
                          px-4 py-2.5 rounded-xl hover:opacity-90 transition"
                   style="background:linear-gradient(45deg,#f09433,#e6683c,#dc2743,#cc2366,#bc1888);">
                    <i class="fa-brands fa-instagram w-4 text-center"></i> Instagram
                </a>
                <a href="https://t.me/ThorngDy" target="_blank"
                   class="flex items-center gap-3 bg-sky-500 hover:bg-sky-600
                          text-white text-sm font-medium px-4 py-2.5 rounded-xl transition">
                    <i class="fa-brands fa-telegram w-4 text-center"></i> Telegram
                </a>
            </div>
        </div>

        @else
                {{-- ══ MEMBER 1 ══ --}}
                <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl p-6
                            border border-blue-100 hover:shadow-lg transition">
                    {{-- Photo --}}
                    <div class="w-24 h-24 rounded-full overflow-hidden mx-auto mb-4
                                border-4 border-white shadow-lg ring-2 ring-blue-100">
                        <img src="{{ asset('images/members/kyra.jpg') }}"
                             alt="Member 1"
                             class="w-full h-full object-cover"
                             onerror="this.src='https://ui-avatars.com/api/?name=Member+1&background=1D4ED8&color=fff&size=96&bold=true'" />
                    </div>
                    {{-- Name & Role --}}
                    <div class="text-center mb-5">
                        <h3 class="font-title font-bold text-gray-900 text-lg leading-tight">
                            Kyra Sydney Anos
                        </h3>
                        <p class="text-blue-600 text-xs font-semibold mt-1">
                            🇵🇭 Philippines Guide
                        </p>
                        <p class="text-gray-400 text-xs mt-0.5">Cultural Heritage Expert</p>
                    </div>
                    {{-- Social Links --}}
                    <div class="flex flex-col gap-2">
                        <a href="https://www.facebook.com/sea.dney"
                           target="_blank"
                           class="flex items-center gap-3 bg-blue-600 hover:bg-blue-700
                                  text-white text-sm font-medium px-4 py-2.5
                                  rounded-xl transition">
                            <i class="fa-brands fa-facebook w-4 text-center"></i>
                            Facebook
                        </a>
                        <a href="https://www.instagram.com/kysqvee?igsh=dmFyNGQ0bXNzZmZy"
                           target="_blank"
                           class="flex items-center gap-3 text-white text-sm font-medium
                                  px-4 py-2.5 rounded-xl hover:opacity-90 transition"
                           style="background:linear-gradient(45deg,#f09433,#e6683c,#dc2743,#cc2366,#bc1888);">
                            <i class="fa-brands fa-instagram w-4 text-center"></i>
                            Instagram
                        </a>
                        <a href="https://t.me/sdkxy"
                           target="_blank"
                           class="flex items-center gap-3 bg-sky-500 hover:bg-sky-600
                                  text-white text-sm font-medium px-4 py-2.5
                                  rounded-xl transition">
                            <i class="fa-brands fa-telegram w-4 text-center"></i>
                            Telegram
                        </a>
                    </div>
                </div>

                {{-- ══ MEMBER 2 ══ --}}
                <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl p-6
                            border border-blue-100 hover:shadow-lg transition">
                    <div class="w-24 h-24 rounded-full overflow-hidden mx-auto mb-4
                                border-4 border-white shadow-lg ring-2 ring-blue-100">
                        <img src="{{ asset('images/members/micko.jpg') }}"
                             alt="Member 2"
                             class="w-full h-full object-cover"
                             onerror="this.src='https://ui-avatars.com/api/?name=Member+2&background=1D4ED8&color=fff&size=96&bold=true'" />
                    </div>
                    <div class="text-center mb-5">
                        <h3 class="font-title font-bold text-gray-900 text-lg leading-tight">
                            Micko James Amolo
                        </h3>
                        <p class="text-blue-600 text-xs font-semibold mt-1">
                            🇵🇭 Philippines Guide
                        </p>
                        <p class="text-gray-400 text-xs mt-0.5">Island & Nature Specialist</p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <a href="https://www.facebook.com/share/1Ap5g77fo5/"
                           target="_blank"
                           class="flex items-center gap-3 bg-blue-600 hover:bg-blue-700
                                  text-white text-sm font-medium px-4 py-2.5
                                  rounded-xl transition">
                            <i class="fa-brands fa-facebook w-4 text-center"></i>
                            Facebook
                        </a>
                        <a href="https://www.instagram.com/_bakokang?igsh=MW5kdmZhbXA2dDhnYg=="
                           target="_blank"
                           class="flex items-center gap-3 text-white text-sm font-medium
                                  px-4 py-2.5 rounded-xl hover:opacity-90 transition"
                           style="background:linear-gradient(45deg,#f09433,#e6683c,#dc2743,#cc2366,#bc1888);">
                            <i class="fa-brands fa-instagram w-4 text-center"></i>
                            Instagram
                        </a>
                        <a href="https://t.me/bakokng"
                           target="_blank"
                           class="flex items-center gap-3 bg-sky-500 hover:bg-sky-600
                                  text-white text-sm font-medium px-4 py-2.5
                                  rounded-xl transition">
                            <i class="fa-brands fa-telegram w-4 text-center"></i>
                            Telegram
                        </a>
                    </div>
                </div>

                {{-- ══ MEMBER 3 ══ --}}
                <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl p-6
                            border border-blue-100 hover:shadow-lg transition">
                    <div class="w-24 h-24 rounded-full overflow-hidden mx-auto mb-4
                                border-4 border-white shadow-lg ring-2 ring-blue-100">
                        <img src="{{ asset('images/members/jilian.jpg') }}"
                             alt="Member 3"
                             class="w-full h-full object-cover"
                             onerror="this.src='https://ui-avatars.com/api/?name=Member+3&background=1D4ED8&color=fff&size=96&bold=true'" />
                    </div>
                    <div class="text-center mb-5">
                        <h3 class="font-title font-bold text-gray-900 text-lg leading-tight">
                            Jilian Louise Pace
                        </h3>
                        <p class="text-blue-600 text-xs font-semibold mt-1">
                            🇵🇭 Philippines Guide
                        </p>
                        <p class="text-gray-400 text-xs mt-0.5">Historical Sites Expert</p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <a href="https://www.facebook.com/share/193r3LKm3s/?mibextid=wwXIfr"
                           target="_blank"
                           class="flex items-center gap-3 bg-blue-600 hover:bg-blue-700
                                  text-white text-sm font-medium px-4 py-2.5
                                  rounded-xl transition">
                            <i class="fa-brands fa-facebook w-4 text-center"></i>
                            Facebook
                        </a>
                        <a href="https://www.instagram.com/_skniiwtt.13?igsh=MWRwODVhcHRmMzF6ag%3D%3D&utm_source=qr"
                           target="_blank"
                           class="flex items-center gap-3 text-white text-sm font-medium
                                  px-4 py-2.5 rounded-xl hover:opacity-90 transition"
                           style="background:linear-gradient(45deg,#f09433,#e6683c,#dc2743,#cc2366,#bc1888);">
                            <i class="fa-brands fa-instagram w-4 text-center"></i>
                            Instagram
                        </a>
                        <a href="https://t.me/ilois_13"
                           target="_blank"
                           class="flex items-center gap-3 bg-sky-500 hover:bg-sky-600
                                  text-white text-sm font-medium px-4 py-2.5
                                  rounded-xl transition">
                            <i class="fa-brands fa-telegram w-4 text-center"></i>
                            Telegram
                        </a>
                    </div>
                </div>

                {{-- ══ MEMBER 4 ══ --}}
                <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl p-6
                            border border-blue-100 hover:shadow-lg transition">
                    <div class="w-24 h-24 rounded-full overflow-hidden mx-auto mb-4
                                border-4 border-white shadow-lg ring-2 ring-blue-100">
                        <img src="{{ asset('images/members/mirich.jpg') }}"
                             alt="Member 4"
                             class="w-full h-full object-cover"
                             onerror="this.src='https://ui-avatars.com/api/?name=Member+4&background=1D4ED8&color=fff&size=96&bold=true'" />
                    </div>
                    <div class="text-center mb-5">
                        <h3 class="font-title font-bold text-gray-900 text-lg leading-tight">
                            Mirich Hycinth Pinero
                        </h3>
                        <p class="text-blue-600 text-xs font-semibold mt-1">
                            🇵🇭 Philippines Guide
                        </p>
                        <p class="text-gray-400 text-xs mt-0.5">Religious Sites Guide</p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <a href="https://www.facebook.com/mirichycinth?mibextid=wwXIfr&mibextid=wwXIfr"
                           target="_blank"
                           class="flex items-center gap-3 bg-blue-600 hover:bg-blue-700
                                  text-white text-sm font-medium px-4 py-2.5
                                  rounded-xl transition">
                            <i class="fa-brands fa-facebook w-4 text-center"></i>
                            Facebook
                        </a>
                        <a href="https://www.instagram.com/mrch_ycnth?igsh=MXcyNDhjMmltMzR6ZQ%3D%3D&utm_source=qr"
                           target="_blank"
                           class="flex items-center gap-3 text-white text-sm font-medium
                                  px-4 py-2.5 rounded-xl hover:opacity-90 transition"
                           style="background:linear-gradient(45deg,#f09433,#e6683c,#dc2743,#cc2366,#bc1888);">
                            <i class="fa-brands fa-instagram w-4 text-center"></i>
                            Instagram
                        </a>
                        <a href="https://t.me/Mirichycinth"
                           target="_blank"
                           class="flex items-center gap-3 bg-sky-500 hover:bg-sky-600
                                  text-white text-sm font-medium px-4 py-2.5
                                  rounded-xl transition">
                            <i class="fa-brands fa-telegram w-4 text-center"></i>
                            Telegram
                        </a>
                    </div>
                </div>

                {{-- ══ MEMBER 5 ══ --}}
                <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl p-6
                            border border-blue-100 hover:shadow-lg transition">
                    <div class="w-24 h-24 rounded-full overflow-hidden mx-auto mb-4
                                border-4 border-white shadow-lg ring-2 ring-blue-100">
                        <img src="{{ asset('images/members/riza.jpg') }}"
                             alt="Member 5"
                             class="w-full h-full object-cover"
                             onerror="this.src='https://ui-avatars.com/api/?name=Member+5&background=1D4ED8&color=fff&size=96&bold=true'" />
                    </div>
                    <div class="text-center mb-5">
                        <h3 class="font-title font-bold text-gray-900 text-lg leading-tight">
                            Riza Mae Remolleno
                        </h3>
                        <p class="text-blue-600 text-xs font-semibold mt-1">
                            🇵🇭 Philippines Guide
                        </p>
                        <p class="text-gray-400 text-xs mt-0.5">Adventure & Nature Guide</p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <a href="https://www.facebook.com/share/1FmPunH8Zj/"
                           target="_blank"
                           class="flex items-center gap-3 bg-blue-600 hover:bg-blue-700
                                  text-white text-sm font-medium px-4 py-2.5
                                  rounded-xl transition">
                            <i class="fa-brands fa-facebook w-4 text-center"></i>
                            Facebook
                        </a>
                        <a href="https://www.instagram.com/riza_rizuhhh?igsh=MnVlbjZnajdnajNo"
                           target="_blank"
                           class="flex items-center gap-3 text-white text-sm font-medium
                                  px-4 py-2.5 rounded-xl hover:opacity-90 transition"
                           style="background:linear-gradient(45deg,#f09433,#e6683c,#dc2743,#cc2366,#bc1888);">
                            <i class="fa-brands fa-instagram w-4 text-center"></i>
                            Instagram
                        </a>
                        <a href="https://t.me/itsrizagurl"
                           target="_blank"
                           class="flex items-center gap-3 bg-sky-500 hover:bg-sky-600
                                  text-white text-sm font-medium px-4 py-2.5
                                  rounded-xl transition">
                            <i class="fa-brands fa-telegram w-4 text-center"></i>
                            Telegram
                        </a>
                    </div>
                </div>
                {{-- ══ MEMBER 6 ══ --}}
                <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl p-6
                            border border-blue-100 hover:shadow-lg transition">
                    <div class="w-24 h-24 rounded-full overflow-hidden mx-auto mb-4
                                border-4 border-white shadow-lg ring-2 ring-blue-100">
                        <img src="{{ asset('images/members/jerry.jpg') }}"
                             alt="Member 4"
                             class="w-full h-full object-cover"
                             onerror="this.src='https://ui-avatars.com/api/?name=Member+4&background=1D4ED8&color=fff&size=96&bold=true'" />
                    </div>
                    <div class="text-center mb-5">
                        <h3 class="font-title font-bold text-gray-900 text-lg leading-tight">
                            Jerry Ann Montejo
                        </h3>
                        <p class="text-blue-600 text-xs font-semibold mt-1">
                            🇵🇭 Philippines Guide
                        </p>
                        <p class="text-gray-400 text-xs mt-0.5">Religious Sites Guide</p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <a href="https://www.facebook.com/jiriyann?mibextid=wwXIfr&mibextid=wwXIfr"
                           target="_blank"
                           class="flex items-center gap-3 bg-blue-600 hover:bg-blue-700
                                  text-white text-sm font-medium px-4 py-2.5
                                  rounded-xl transition">
                            <i class="fa-brands fa-facebook w-4 text-center"></i>
                            Facebook
                        </a>
                        <a href="https://www.instagram.com/xxurfavja?igsh=MW5za3VybXEyNW8zNQ=="
                           target="_blank"
                           class="flex items-center gap-3 text-white text-sm font-medium
                                  px-4 py-2.5 rounded-xl hover:opacity-90 transition"
                           style="background:linear-gradient(45deg,#f09433,#e6683c,#dc2743,#cc2366,#bc1888);">
                            <i class="fa-brands fa-instagram w-4 text-center"></i>
                            Instagram
                        </a>
                        <a href="https://t.me/jiriyann"
                           target="_blank"
                           class="flex items-center gap-3 bg-sky-500 hover:bg-sky-600
                                  text-white text-sm font-medium px-4 py-2.5
                                  rounded-xl transition">
                            <i class="fa-brands fa-telegram w-4 text-center"></i>
                            Telegram
                        </a>
                    </div>
                </div>
                 {{-- ══ MEMBER 5 ══ --}}
                <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl p-6
                            border border-blue-100 hover:shadow-lg transition">
                    <div class="w-24 h-24 rounded-full overflow-hidden mx-auto mb-4
                                border-4 border-white shadow-lg ring-2 ring-blue-100">
                        <img src="{{ asset('images/members/jayson.jpg') }}"
                             alt="Member 5"
                             class="w-full h-full object-cover"
                             onerror="this.src='https://ui-avatars.com/api/?name=Member+5&background=1D4ED8&color=fff&size=96&bold=true'" />
                    </div>
                    <div class="text-center mb-5">
                        <h3 class="font-title font-bold text-gray-900 text-lg leading-tight">
                            Jayson Lozada
                        </h3>
                        <p class="text-blue-600 text-xs font-semibold mt-1">
                            🇵🇭 Philippines Guide
                        </p>
                        <p class="text-gray-400 text-xs mt-0.5">Adventure & Nature Guide</p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <a href="https://www.facebook.com/jayson.gerona.lozad"
                           target="_blank"
                           class="flex items-center gap-3 bg-blue-600 hover:bg-blue-700
                                  text-white text-sm font-medium px-4 py-2.5
                                  rounded-xl transition">
                            <i class="fa-brands fa-facebook w-4 text-center"></i>
                            Facebook
                        </a>
                        <a href="https://www.instagram.com/lozada.2004/"
                           target="_blank"
                           class="flex items-center gap-3 text-white text-sm font-medium
                                  px-4 py-2.5 rounded-xl hover:opacity-90 transition"
                           style="background:linear-gradient(45deg,#f09433,#e6683c,#dc2743,#cc2366,#bc1888);">
                            <i class="fa-brands fa-instagram w-4 text-center"></i>
                            Instagram
                        </a>
                        <a href="https://t.me/JGLozada"
                           target="_blank"
                           class="flex items-center gap-3 bg-sky-500 hover:bg-sky-600
                                  text-white text-sm font-medium px-4 py-2.5
                                  rounded-xl transition">
                            <i class="fa-brands fa-telegram w-4 text-center"></i>
                            Telegram
                        </a>
                    </div>
                </div>
               
            </div>
    @endif

            {{-- Footer Note --}}
    <div class="mt-8 p-5 bg-blue-50 rounded-2xl border border-blue-100 text-center">
        <p class="text-blue-700 text-sm font-medium">
            <i class="fa-solid fa-circle-info mr-2"></i>
            Click any social link to contact our tour guides directly!
        </p>
    </div>
  
</div>
 </div> {{-- close actual-content ✅ --}}
    </div>
     
</div>

{{-- ── Tour Guide JS ── --}}
<script>
    // ══ SKELETON LOADING ══
document.addEventListener('DOMContentLoaded', () => {
    const skeleton = document.getElementById('skeleton-grid');
    const content  = document.getElementById('actual-content');

    // Hide skeleton, show content after short delay
    setTimeout(() => {
        if (skeleton) skeleton.style.display = 'none';
        if (content)  content.classList.remove('hidden');
    }, 600);
});
function openTourGuide() {
    const modal = document.getElementById('tourGuideModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closeTourGuide() {
    const modal = document.getElementById('tourGuideModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.style.overflow = '';
}

// Click outside to close
document.getElementById('tourGuideModal')
        .addEventListener('click', function(e) {
    if (e.target === this) closeTourGuide();
});

// ESC key to close
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeTourGuide();
});
</script>


@endsection