@extends('layouts.app')
@section('title', $landmark->name . ' — Cultural Landmark Explorer')

@section('content')

@php $isKH = $landmark->country === 'cambodia'; @endphp

<!-- BREADCRUMB -->
<div class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-6 py-3">
        <nav class="flex items-center gap-2 text-sm text-gray-500">
            <a href="{{ route('home') }}" class="hover:text-blue-600 transition">Home</a>
            <i class="fa-solid fa-chevron-right text-xs"></i>
            <a href="{{ route('country.show', $landmark->country) }}" class="hover:text-blue-600 transition capitalize">{{ ucfirst($landmark->country) }}</a>
            <i class="fa-solid fa-chevron-right text-xs"></i>
            <span class="text-gray-800 font-medium">{{ $landmark->name }}</span>
        </nav>
    </div>
</div>

<div class="max-w-7xl mx-auto px-6 py-10">
    <div class="grid lg:grid-cols-3 gap-10">

        <!-- LEFT -->
        <div class="lg:col-span-2 space-y-6">

            {{-- Hero Image --}}
<div class="rounded-2xl overflow-hidden shadow-md aspect-video relative">

    @php
    $detailImages = [
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

    $heroImg = $detailImages[$landmark->slug] ?? null;
    @endphp

    {{-- Fallback Background --}}
    <div class="absolute inset-0 {{ $isKH ? 'bg-blue-100' : 'bg-slate-100' }}
                flex items-center justify-center flex-col gap-3">
        <i class="fa-solid fa-landmark text-7xl
                  {{ $isKH ? 'text-blue-200' : 'text-slate-300' }}"></i>
        <p class="text-gray-400 text-sm">{{ $landmark->name }}</p>
    </div>

    {{-- Real Image --}}
    @if($heroImg)
    <img src="{{ $heroImg }}"
         alt="{{ $landmark->name }}"
         class="absolute inset-0 w-full h-full object-cover"
         onerror="this.style.display='none'" />
    @endif
    {{-- Badges --}}
    <div class="absolute top-4 left-4 flex gap-2 z-10">
        <span class="text-sm font-bold px-3 py-1 rounded-full
                     {{ $isKH ? 'badge-kh' : 'bg-gray-800 text-white' }}">
            {{ $landmark->country_code }}
        </span>
        <span class="text-sm font-semibold px-3 py-1 rounded-full
                     cat-{{ strtolower($landmark->category) }}">
            {{ $landmark->category }}
        </span>
    </div>

</div>

            <!-- Description -->
            <div class="bg-white rounded-2xl p-7 shadow-sm border border-gray-100">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 {{ $isKH ? 'bg-blue-50' : 'bg-red-50' }} rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-file-lines {{ $isKH ? 'text-blue-600' : 'text-red-600' }}"></i>
                    </div>
                    <h2 class="font-bold text-xl text-gray-800">Description</h2>
                </div>
                <p class="text-gray-600 leading-relaxed">{{ $landmark->description }}</p>
            </div>

            <!-- Why Visit -->
            <div class="{{ $isKH ? 'bg-blue-50 border-blue-600' : 'bg-red-50 border-red-600' }} rounded-2xl p-7 border-l-4">
                <div class="flex items-center gap-3 mb-3">
                    <span class="text-2xl">⭐</span>
                    <h2 class="font-bold text-xl {{ $isKH ? 'text-blue-600' : 'text-red-600' }}">Why Visit?</h2>
                </div>
                <p class="text-gray-700 leading-relaxed">{{ $landmark->why_visit }}</p>
            </div>

            <!-- Fun Fact -->
            @if ($landmark->fun_fact)
            <div class="bg-gray-900 text-white rounded-2xl p-6">
                <div class="flex items-center gap-3 mb-3">
                    <span class="text-2xl">💡</span>
                    <h3 class="font-mono text-sm text-green-400 font-semibold"></h3>
                </div>
                <p class="text-white/80 leading-relaxed">{{ $landmark->fun_fact }}</p>
            </div>
            @endif

            <!-- Location -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-red-50 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-location-dot text-red-600"></i>
                    </div>
                    <div>
                        <h2 class="font-bold text-lg text-gray-800">Location</h2>
                        <p class="text-gray-500">{{ $landmark->location }}, {{ ucfirst($landmark->country) }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT SIDEBAR -->
        <div class="space-y-5">

            <!-- Title Card -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <h1 class="font-bold text-2xl text-gray-800 mb-2">{{ $landmark->name }}</h1>
                <p class="text-gray-500 text-sm flex items-center gap-1.5 mb-4">
                    <i class="fa-solid fa-location-dot text-red-500 text-xs"></i> {{ $landmark->location }}
                </p>

                <button id="fav-btn" onclick="toggleFavorite('{{ $landmark->slug }}')"
                        class="w-full flex items-center justify-center gap-2 py-3 rounded-xl border-2 font-semibold text-sm transition {{ $isFavorite ? 'bg-red-50 border-red-500 text-red-600' : 'border-gray-200 text-gray-600 hover:border-red-500 hover:text-red-600' }}">
                    <i id="fav-icon" class="fa-{{ $isFavorite ? 'solid fav-active' : 'regular' }} fa-heart"></i>
                    <span id="fav-text">{{ $isFavorite ? 'Saved to Favorites' : 'Save to Favorites' }}</span>
                </button>

                <button onclick="shareLandmark()"
                        class="w-full mt-3 flex items-center justify-center gap-2 py-3 rounded-xl border-2 border-gray-200 text-gray-600 text-sm font-semibold hover:border-blue-600 hover:text-blue-600 transition">
                    <i class="fa-solid fa-share-nodes"></i> Share Landmark
                </button>
                @if($landmark->latitude && $landmark->longitude)
<button onclick="openMap()"
        class="w-full mt-3 flex items-center justify-center gap-2 py-3
               rounded-xl border-2 border-gray-200 text-gray-600 text-sm
               font-semibold hover:border-green-600 hover:text-green-600 transition">
    <i class="fa-solid fa-map-location-dot"></i> View on Map
</button>
@endif
            </div>

            <!-- Details -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <h3 class="font-bold text-gray-800 mb-4">Landmark Details</h3>
                <div class="space-y-3">
                    <div class="flex items-center gap-3 py-2 border-b border-gray-100">
                        <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                            <i class="fa-solid fa-globe text-blue-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs">Country</p>
                            <p class="text-gray-800 text-sm font-semibold">{{ ucfirst($landmark->country) }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 py-2 border-b border-gray-100">
                        <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                            <i class="fa-solid fa-tags {{ $isKH ? 'text-blue-600' : 'text-red-600' }} text-sm"></i>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs">Category</p>
                            <p class="text-gray-800 text-sm font-semibold">{{ $landmark->category }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 py-2 border-b border-gray-100">
                        <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                            <i class="fa-solid fa-location-dot text-red-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs">Location</p>
                            <p class="text-gray-800 text-sm font-semibold">{{ $landmark->location }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 py-2">
                        <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                            <i class="fa-solid fa-flag text-gray-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs">Country Code</p>
                            <p class="text-gray-800 text-sm font-semibold">{{ $landmark->country_code }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 space-y-3">
                <h3 class="font-bold text-gray-800 mb-3">Navigation</h3>

                <a href="{{ route('country.show', $landmark->country) }}"
                   class="flex items-center gap-3 p-3 rounded-xl bg-gray-50 hover:bg-blue-50 hover:text-blue-600 transition group">
                    <div class="w-9 h-9 bg-white rounded-lg shadow-sm flex items-center justify-center">
                        <i class="fa-solid fa-arrow-left text-sm text-gray-500 group-hover:text-blue-600"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-600 group-hover:text-blue-600">Back to {{ ucfirst($landmark->country) }}</span>
                </a>

                <a href="{{ route('home') }}"
                   class="flex items-center gap-3 p-3 rounded-xl bg-gray-50 hover:bg-blue-50 hover:text-blue-600 transition group">
                    <div class="w-9 h-9 bg-white rounded-lg shadow-sm flex items-center justify-center">
                        <i class="fa-solid fa-house text-sm text-gray-500 group-hover:text-blue-600"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-600 group-hover:text-blue-600">Home</span>
                </a>

                <a href="{{ route('favorites.index') }}"
                   class="flex items-center gap-3 p-3 rounded-xl bg-gray-50 hover:bg-red-50 hover:text-red-600 transition group">
                    <div class="w-9 h-9 bg-white rounded-lg shadow-sm flex items-center justify-center">
                        <i class="fa-solid fa-heart text-sm text-gray-500 group-hover:text-red-600"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-600 group-hover:text-red-600">My Favorites</span>
                </a>
            </div>
        </div>
    </div>

    {{-- ══ RELATED LANDMARKS — SWIPEABLE ══ --}}
@if ($related->isNotEmpty())

@php
$relatedImages = [
    // Cambodia
    'angkor-wat'              => asset('images/landmarks/cambodia.jpg'),
    'bayon-temple'            => asset('images/landmarks/bayon-temple.jpg'),
    'royal-palace-phnom-penh' => asset('images/landmarks/royal-palace.jpg'),
    'phnom-kulen'             => asset('images/landmarks/phnom-kulen.jpg'),
    'tuol-sleng-museum'       => asset('images/landmarks/tuol-sleng-museum.jpg'),
    'ta-prohm-temple'         => asset('images/landmarks/ta-prohm-temple.jpg'),
    'sambor-prei-kuk'         => asset('images/landmarks/sambor-prei-kuk.jpg'),
    'preah-vihear-temple'     => asset('images/landmarks/preah-vihear-temple.jpg'),
    'phnom-bakheng-temple'    => asset('images/landmarks/phnom-bakheng.jpg'),
    'national-museum-cambodia'=> asset('images/landmarks/national-museum-cambodia.jpg'),
    'koh-ker'                 => asset('images/landmarks/koh-ker.jpg'),
    'independence-monument'   => asset('images/landmarks/independence-monument.jpg'),
    'choeng-ek-killing-fields'=> asset('images/landmarks/choeng-ek.jpg'),
    'beng-mealea-temple'      => asset('images/landmarks/beng-mealea.jpg'),
    'banteay-srei'            => asset('images/landmarks/banteay-srei.jpg'),
    'banteay-samre'           => asset('images/landmarks/banteay-samre.jpg'),
    'banteay-chhmar'          => asset('images/landmarks/banteay-chhmar.jpg'),
    'tonle-sap-lake'          => asset('images/landmarks/tonle-sap-lake.jpg'),
    'irrawaddy-dolphin-pools-kratie' => asset('images/landmarks/irrawaddy-dolphins.jpg'),
    'sok-san-beach'           => asset('images/landmarks/sok-san-beach.jpg'),
    'phnom-sampov-mountain'   => asset('images/landmarks/phnom-sampov.jpg'),
    'ream-national-park'      => asset('images/landmarks/ream-national-park.jpg'),
    'ratanakiri-province'     => asset('images/landmarks/ratanakiri.jpg'),
    'prek-toal-bird-sanctuary'=> asset('images/landmarks/prek-toal.jpg'),
    'phnom-chhngok-cave-temple'=> asset('images/landmarks/phnom-chhngok.jpg'),
    'peam-krasop-mangrove-sanctuary' => asset('images/landmarks/peam-krasop.jpg'),
    'otres-beach'             => asset('images/landmarks/otres-beach.jpg'),
    'mondulkiri'              => asset('images/landmarks/mondulkiri.jpg'),
    'koh-rong-sanloem'        => asset('images/landmarks/koh-rong-sanloem.jpg'),
    'koh-rong-island'         => asset('images/landmarks/koh-rong-island.jpg'),
    'kirirom-national-park'   => asset('images/landmarks/kirirom-national-park.jpg'),
    'kep-national-park'       => asset('images/landmarks/kep-national-park.jpg'),
    'bousra-waterfall'        => asset('images/landmarks/bousra-waterfall.jpg'),
    'battambang-bat-caves'    => asset('images/landmarks/battambang-bat-caves.jpg'),
    'wat-vihear-suor'         => asset('images/landmarks/wat-vihear-suor.jpg'),
    'wat-preah-prom-rath'     => asset('images/landmarks/wat-preah-prom-rath.jpg'),
    'wat-ounalom'             => asset('images/landmarks/wat-ounalom.jpg'),
    'wat-preah-keo-morakot'   => asset('images/landmarks/silver-pagoda.jpg'),
    'phnom-oudong'            => asset('images/landmarks/phnom-oudong.jpg'),
    'visak-bochea-festival'   => asset('images/landmarks/visak-bochea.jpg'),
    'pchum-ben-festival'      => asset('images/landmarks/pchum-ben.jpg'),
    'bon-om-touk-festival'    => asset('images/landmarks/bon-om-touk.jpg'),
    'buddhist-monks-cambodia' => asset('images/landmarks/buddhist-monks.jpg'),

    // Philippines
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
    'plaza-cuartel'           => asset('images/landmarks/plaza-cuartel.jpg'),
    'guisi-lighthouse'        => asset('images/landmarks/guisi-lighthouse.jpg'),
    'biak-na-bato-national-park' => asset('images/landmarks/biak-na-bato.jpg'),
    'callao-cave'             => asset('images/landmarks/callao-cave.jpg'),
    'binondo-chinatown'       => asset('images/landmarks/binondo-chinatown.jpg'),
    'leyte-landing-memorial'  => asset('images/landmarks/leyte-landing-memorial.jpg'),
    'mount-samat-national-shrine' => asset('images/landmarks/mount-samat-shrine.jpg'),
    'chocolate-hills'         => asset('images/landmarks/chocolate-hills.jpg'),
    'mayon-volcano'           => asset('images/landmarks/mayon-volcano.jpg'),
    'boracay'                 => asset('images/landmarks/boracay.jpg'),
    'puerto-princesa-underground-river' => asset('images/landmarks/puerto-princesa-underground-river.jpg'),
    'banaue-rice-terraces'    => asset('images/landmarks/banaue-rice-terraces.jpg'),
    'siargao-island'          => asset('images/landmarks/siargao-island.jpg'),
    'kayangan-lake'           => asset('images/landmarks/kayangan-lake.jpg'),
    'hinatuan-enchanted-river'=> asset('images/landmarks/hinatuan-enchanted-river.jpg'),
    'tinago-falls'            => asset('images/landmarks/tinago-falls.jpeg'),
    'maria-cristina-falls'    => asset('images/landmarks/maria-cristina-falls.jpeg'),
    'camiguin-island'         => asset('images/landmarks/camiguin-island.jpeg'),
    'bong-bato-peak'          => asset('images/landmarks/bong-bato-peak.jpg'),
    'tubbataha-reef-natural-park' => asset('images/landmarks/tubbataha-reef.jpg'),
    'mount-pinatubo'          => asset('images/landmarks/mount-pinatubo.jpg'),
    'osmena-peak'             => asset('images/landmarks/osmena-peak.jpg'),
    'hundred-islands-national-park' => asset('images/landmarks/hundred-islands.jpg'),
    'asik-asik-falls'         => asset('images/landmarks/asik-asik-falls.jpg'),
    'barracuda-lake'          => asset('images/landmarks/barracuda-lake.jpg'),
    'magpupungko-rock-pools'  => asset('images/landmarks/magpupungko-rock-pools.jpg'),
    'biri-island-rock-formations' => asset('images/landmarks/biri-rock-formations.jpg'),
    'sabtang-batanes-island'  => asset('images/landmarks/sabtang-batanes.jpg'),
    'san-agustin-church'      => asset('images/landmarks/san-agustin-church.jpg'),
    'paoay-church'            => asset('images/landmarks/paoay-church.jpg'),
    'taal-basilica'           => asset('images/landmarks/taal-basilica.jpg'),
    'basilica-del-santo-nino' => asset('images/landmarks/basilica-del-santo-nino.jpg'),
    'grand-mosque-of-cotabato'=> asset('images/landmarks/grand-mosque-cotabato.jpg'),
    'shrine-holy-infant-jesus'=> asset('images/landmarks/shrine-holy-infant-jesus.jpg'),
    'barasoain-church'        => asset('images/landmarks/barasoain-church.jpg'),
    'national-shrine-padre-pio' => asset('images/landmarks/national-shrine-padre-pio.jpg'),
    'callao-cave-chapel'      => asset('images/landmarks/callao-cave-chapel.jpeg'),
    'tamayong-prayer-mountain'=> asset('images/landmarks/tamayong-prayer-mountain.jpeg'),
    'abbey-of-the-transfiguration' => asset('images/landmarks/abbey-transfiguration.jpg'),
];
@endphp

<div class="mt-16">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <h2 class="font-title text-2xl font-bold text-gray-900">
            More from {{ ucfirst($landmark->country) }}
        </h2>
        {{-- Controls --}}
        <div class="flex items-center gap-2">
            <button id="related-prev"
                    class="w-9 h-9 bg-gray-100 hover:bg-blue-600 hover:text-white
                           rounded-full flex items-center justify-center transition group">
                <i class="fa-solid fa-chevron-left text-xs text-gray-600 group-hover:text-white"></i>
            </button>
            <button id="related-next"
                    class="w-9 h-9 bg-blue-600 hover:bg-blue-700 rounded-full
                           flex items-center justify-center transition">
                <i class="fa-solid fa-chevron-right text-xs text-white"></i>
            </button>
        </div>
    </div>

    {{-- Slider --}}
    <div class="overflow-hidden" id="related-wrap">
        <div class="flex gap-5 transition-transform duration-500 ease-in-out"
             id="related-track"
             style="will-change: transform;">

            @foreach ($related as $rel)
            @php $relImg = $relatedImages[$rel->slug] ?? null; @endphp

            <a href="{{ route('landmark.show', $rel->slug) }}"
               class="flex-shrink-0 w-72 bg-white rounded-2xl overflow-hidden
                      shadow-sm border border-gray-100 group landmark-card block">

                {{-- Image --}}
                <div class="h-44 relative overflow-hidden">

                    {{-- Fallback --}}
                    <div class="absolute inset-0 bg-gradient-to-br
                                {{ $isKH ? 'from-blue-100 to-blue-200' : 'from-slate-100 to-blue-100' }}
                                flex items-center justify-center">
                        <i class="fa-solid fa-landmark text-4xl
                                  {{ $isKH ? 'text-blue-300' : 'text-slate-300' }}"></i>
                    </div>

                    {{-- Real Image --}}
                    @if($relImg)
                    <img src="{{ $relImg }}"
                         alt="{{ $rel->name }}"
                         class="absolute inset-0 w-full h-full object-cover
                                group-hover:scale-110 transition-transform duration-700"
                         onerror="this.style.display='none'" />
                    @endif

                    {{-- Overlay --}}
                    <div class="absolute bottom-0 left-0 right-0 h-16
                                bg-gradient-to-t from-black/50 to-transparent z-10">
                    </div>

                    {{-- Category Badge --}}
                    <span class="absolute top-3 right-3 z-20 text-xs font-semibold
                                 px-2.5 py-1 rounded-full
                                 cat-{{ strtolower($rel->category) }}">
                        {{ $rel->category }}
                    </span>

                    {{-- Country Badge --}}
                    <span class="absolute top-3 left-3 z-20 text-xs font-bold
                                 px-2.5 py-1 rounded-full
                                 {{ $rel->country_code === 'KH'
                                    ? 'bg-blue-600 text-white'
                                    : 'bg-gray-800 text-white' }}">
                        {{ $rel->country_code }}
                    </span>
                </div>

                {{-- Info --}}
                <div class="p-4">
                    <h3 class="font-title font-bold text-gray-900 text-base
                               group-hover:text-blue-600 transition leading-tight mb-1">
                        {{ $rel->name }}
                    </h3>
                    <p class="text-gray-500 text-xs flex items-center gap-1">
                        <i class="fa-solid fa-location-dot text-blue-500 text-xs"></i>
                        {{ $rel->location }}
                    </p>
                </div>
            </a>
            @endforeach

        </div>
    </div>

    {{-- Dot Indicators --}}
    <div class="flex justify-center gap-2 mt-5" id="related-dots">
        @foreach($related as $i => $rel)
        <button class="related-dot h-2 w-2 rounded-full bg-gray-300
                       transition-all duration-300"
                data-index="{{ $i }}">
        </button>
        @endforeach
    </div>

</div>
@endif
</div>
{{-- MAP MODAL --}}
@if($landmark->latitude && $landmark->longitude)
<div id="map-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4"
     style="background: rgba(0,0,0,0.7)">
    <div class="bg-white rounded-2xl overflow-hidden shadow-2xl w-full max-w-2xl">
        <div class="flex items-center justify-between p-4 border-b border-gray-100">
            <h3 class="font-bold text-gray-800 flex items-center gap-2">
                <i class="fa-solid fa-location-dot text-red-500"></i>
                {{ $landmark->name }}
            </h3>
            <button onclick="closeMap()"
                    class="w-8 h-8 bg-gray-100 hover:bg-gray-200 rounded-full
                           flex items-center justify-center transition">
                <i class="fa-solid fa-xmark text-gray-600"></i>
            </button>
        </div>
        <div id="landmark-map" style="height: 400px; width: 100%;"></div>
        <div class="p-4 border-t border-gray-100 flex gap-3">
            <a href="https://www.google.com/maps?q={{ $landmark->latitude }},{{ $landmark->longitude }}"
               target="_blank"
               class="flex-1 flex items-center justify-center gap-2 bg-blue-600
                      text-white py-2.5 rounded-xl text-sm font-semibold
                      hover:bg-blue-700 transition">
                <i class="fa-solid fa-diamond-turn-right"></i>
                Open in Google Maps
            </a>
            <button onclick="closeMap()"
                    class="px-5 py-2.5 rounded-xl border-2 border-gray-200
                           text-gray-600 text-sm font-semibold hover:bg-gray-50 transition">
                Close
            </button>
        </div>
    </div>
</div>
@endif
@endsection
{{-- SWIPE INDICATOR --}}
<div id="swipe-indicator"
     class="fixed bottom-24 left-1/2 -translate-x-1/2 z-50
            bg-gray-900/80 text-white text-sm font-semibold
            px-5 py-2 rounded-full opacity-0 transition-opacity duration-300
            pointer-events-none backdrop-blur-sm">
</div>

@push('scripts')

<script>
    // ══ SWIPE NAVIGATION ══
(function() {
    let startX = 0;
    let startY = 0;
    let isDragging = false;

    document.addEventListener('touchstart', e => {
        startX = e.touches[0].clientX;
        startY = e.touches[0].clientY;
        isDragging = true;
    }, { passive: true });

    document.addEventListener('touchend', e => {
        if (!isDragging) return;
        isDragging = false;

        const diffX = startX - e.changedTouches[0].clientX;
        const diffY = startY - e.changedTouches[0].clientY;

        // Siguroha horizontal swipe (dili vertical scroll)
        if (Math.abs(diffX) < Math.abs(diffY)) return;
        if (Math.abs(diffX) < 80) return; // minimum swipe distance

        if (diffX > 0) {
            // Swipe LEFT → next landmark
            swipeNavigate('next');
        } else {
            // Swipe RIGHT → previous (back to country)
            swipeNavigate('prev');
        }
    }, { passive: true });

    function swipeNavigate(direction) {
        // Show swipe indicator
        const indicator = document.getElementById('swipe-indicator');
        if (indicator) {
            indicator.textContent = direction === 'next' ? '→ Next Landmark' : '← Back';
            indicator.classList.remove('opacity-0');
            indicator.classList.add('opacity-100');
        }

        if (direction === 'next') {
            // Random related landmark
            const related = document.querySelectorAll('#related-track a');
            if (related.length > 0) {
                const random = related[Math.floor(Math.random() * related.length)];
                setTimeout(() => { window.location.href = random.href; }, 300);
            }
        } else {
            // Go back
            setTimeout(() => { history.back(); }, 300);
        }
    }
})();
// ══ FAVORITE TOGGLE ══
function toggleFavorite(slug) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]');

    if (!csrfToken) {
        console.error('CSRF token not found!');
        return;
    }

    fetch(`/favorites/toggle/${slug}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken.content,
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
        credentials: 'same-origin', // ✅ Important for session
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok: ' + response.status);
        }
        return response.json();
    })
    .then(data => {
        console.log('Toggle result:', data); // Debug

        const btn  = document.getElementById('fav-btn');
        const icon = document.getElementById('fav-icon');
        const text = document.getElementById('fav-text');

        if (data.status === 'added') {
            btn.classList.add('bg-red-50', 'border-red-500', 'text-red-600');
            btn.classList.remove('border-gray-200', 'text-gray-600');
            icon.classList.remove('fa-regular');
            icon.classList.add('fa-solid', 'fav-active');
            text.textContent = 'Saved to Favorites';

            // ✅ Save sa localStorage
            let favs = JSON.parse(localStorage.getItem('fav_slugs') || '[]');
            if (!favs.includes(slug)) favs.push(slug);
            localStorage.setItem('fav_slugs', JSON.stringify(favs));

        } else {
            btn.classList.remove('bg-red-50', 'border-red-500', 'text-red-600');
            btn.classList.add('border-gray-200', 'text-gray-600');
            icon.classList.remove('fa-solid', 'fav-active');
            icon.classList.add('fa-regular');
            text.textContent = 'Save to Favorites';

            // ✅ Remove sa localStorage
            let favs = JSON.parse(localStorage.getItem('fav_slugs') || '[]');
            favs = favs.filter(f => f !== slug);
            localStorage.setItem('fav_slugs', JSON.stringify(favs));
        }
    })
    .catch(error => {
        console.error('Favorites error:', error);
        alert('Error saving favorite. Please try again.');
    });
}

function shareLandmark() {
    if (navigator.share) {
        navigator.share({ title: document.title, url: window.location.href });
    } else {
        navigator.clipboard.writeText(window.location.href);
        alert('Link copied to clipboard!');
    }
}

(function() {
    const track  = document.getElementById('related-track');
    const wrap   = document.getElementById('related-wrap');
    const dots   = document.querySelectorAll('.related-dot');
    const prev   = document.getElementById('related-prev');
    const next   = document.getElementById('related-next');

    if (!track) return;

    const cards  = track.querySelectorAll('a');
    let current  = 0;
    let perView  = 3;

    function getPerView() {
        if (window.innerWidth < 640)  return 1;
        if (window.innerWidth < 1024) return 2;
        return 3;
    }

    function getCardWidth() {
        if (!cards.length) return 0;
        return cards[0].offsetWidth + 20;
    }

    function goTo(index) {
        perView = getPerView();
        const max = Math.max(0, cards.length - perView);
        current = Math.max(0, Math.min(index, max));

        track.style.transform = `translateX(-${current * getCardWidth()}px)`;

        dots.forEach((dot, i) => {
            if (i === current) {
                dot.classList.remove('bg-gray-300');
                dot.classList.add('bg-blue-600', 'w-5');
            } else {
                dot.classList.remove('bg-blue-600', 'w-5');
                dot.classList.add('bg-gray-300');
            }
        });
    }

    if (prev) prev.addEventListener('click', () => goTo(current - 1));
    if (next) next.addEventListener('click', () => goTo(current + 1));

    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => goTo(i));
    });

    let startX = 0;
    track.addEventListener('touchstart', e => {
        startX = e.touches[0].clientX;
    }, { passive: true });
    track.addEventListener('touchend', e => {
        const diff = startX - e.changedTouches[0].clientX;
        if (Math.abs(diff) > 50) goTo(diff > 0 ? current + 1 : current - 1);
    });

    let auto = setInterval(() => {
        const max = Math.max(0, cards.length - getPerView());
        goTo(current + 1 > max ? 0 : current + 1);
    }, 3500);

    if (wrap) {
        wrap.addEventListener('mouseenter', () => clearInterval(auto));
        wrap.addEventListener('mouseleave', () => {
            auto = setInterval(() => {
                const max = Math.max(0, cards.length - getPerView());
                goTo(current + 1 > max ? 0 : current + 1);
            }, 3500);
        });
    }

    window.addEventListener('resize', () => goTo(0));
    goTo(0);
})();
// ══ MAP MODAL ══
@if($landmark->latitude && $landmark->longitude)
let mapInitialized = false;

function openMap() {
    const modal = document.getElementById('map-modal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');

    if (!mapInitialized) {
        const map = L.map('landmark-map').setView(
            [{{ $landmark->latitude }}, {{ $landmark->longitude }}], 13
        );

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        L.marker([{{ $landmark->latitude }}, {{ $landmark->longitude }}])
            .addTo(map)
            .bindPopup('<b>{{ $landmark->name }}</b><br>{{ $landmark->location }}')
            .openPopup();

        mapInitialized = true;
    }
}

function closeMap() {
    const modal = document.getElementById('map-modal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

// Close modal pag click sa background
document.getElementById('map-modal')?.addEventListener('click', function(e) {
    if (e.target === this) closeMap();
});
@endif

</script>
@endpush