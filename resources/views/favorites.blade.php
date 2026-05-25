@extends('layouts.app')
@section('title', 'My Favorites — Cultural Landmark Explorer')

@section('content')

@php
$favImages = [
    // Cambodia
    'angkor-wat'              => asset('images/landmarks/angkor-wat.jpg'),
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

<div class="max-w-7xl mx-auto px-6 py-12">

    {{-- Header --}}
    <div class="flex items-center gap-4 mb-10">
        <div class="w-14 h-14 bg-red-50 rounded-2xl flex items-center justify-center">
            <i class="fa-solid fa-heart text-red-500 text-2xl"></i>
        </div>
        <div>
            <span class="text-red-500 font-mono text-xs tracking-widest uppercase font-bold">
                
            </span>
            <h1 class="font-title font-bold text-3xl text-gray-900">My Favorites</h1>
        </div>
        @if($landmarks->isNotEmpty())
        <span class="ml-auto bg-red-50 text-red-600 text-sm font-bold
                     px-4 py-2 rounded-full border border-red-100">
            {{ $landmarks->count() }} saved
        </span>
        @endif
    </div>

    {{-- Empty State --}}
    @if($landmarks->isEmpty())
        <div class="text-center py-28 bg-white rounded-3xl border border-gray-100 shadow-sm">
            <div class="w-24 h-24 bg-red-50 rounded-full flex items-center
                        justify-center mx-auto mb-6">
                <i class="fa-regular fa-heart text-4xl text-red-300"></i>
            </div>
            <p class="text-gray-700 text-xl font-bold mb-2">No favorites yet!</p>
            <p class="text-gray-400 text-sm mb-8">
                Start exploring and save landmarks you love.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('country.show', 'cambodia') }}"
                   class="inline-flex items-center gap-2 bg-blue-600 text-white
                          px-6 py-3 rounded-full text-sm font-semibold
                          hover:bg-blue-700 transition">
                    🇰🇭 Explore Cambodia
                </a>
                <a href="{{ route('country.show', 'philippines') }}"
                   class="inline-flex items-center gap-2 bg-gray-800 text-white
                          px-6 py-3 rounded-full text-sm font-semibold
                          hover:bg-gray-900 transition">
                    🇵🇭 Explore Philippines
                </a>
            </div>
        </div>

    {{-- Favorites Grid --}}
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7">
            @foreach($landmarks as $lm)

            @php
                $favImg = $favImages[$lm->slug] ?? null;
                $isKH   = $lm->country === 'cambodia';
            @endphp

            <a href="{{ route('landmark.show', $lm->slug) }}"
               class="landmark-card bg-white rounded-2xl overflow-hidden
                      shadow-sm group block border border-gray-100">

                {{-- Image --}}
                <div class="h-52 relative overflow-hidden">

                    {{-- Fallback --}}
                    <div class="absolute inset-0 bg-gradient-to-br
                                {{ $isKH ? 'from-blue-100 to-blue-200' : 'from-slate-100 to-blue-100' }}
                                flex items-center justify-center">
                        <i class="fa-solid fa-landmark text-5xl
                                  {{ $isKH ? 'text-blue-300' : 'text-slate-300' }}"></i>
                    </div>

                    {{-- Real Image --}}
                    @if($favImg)
                    <img src="{{ $favImg }}"
                         alt="{{ $lm->name }}"
                         class="absolute inset-0 w-full h-full object-cover
                                group-hover:scale-110 transition-transform duration-700"
                         onerror="this.style.display='none'" />
                    @endif

                    {{-- Overlay --}}
                    <div class="absolute bottom-0 left-0 right-0 h-20
                                bg-gradient-to-t from-black/50 to-transparent z-10">
                    </div>

                    {{-- Heart Icon --}}
                    <div class="absolute top-4 right-4 z-20 w-9 h-9 bg-red-500
                                rounded-full flex items-center justify-center shadow">
                        <i class="fa-solid fa-heart text-white text-sm"></i>
                    </div>

                    {{-- Country Badge --}}
                    <span class="absolute top-4 left-4 z-20 text-xs font-bold
                                 px-2.5 py-1 rounded-full
                                 {{ $lm->country_code === 'KH'
                                    ? 'bg-blue-600 text-white'
                                    : 'bg-gray-800 text-white' }}">
                        {{ $lm->country_code }}
                    </span>

                    {{-- Category Badge --}}
                    <span class="absolute bottom-3 left-4 z-20 text-xs font-semibold
                                 px-2.5 py-1 rounded-full
                                 cat-{{ strtolower($lm->category) }}">
                        {{ $lm->category }}
                    </span>
                </div>

                {{-- Info --}}
                <div class="p-5">
                    <h3 class="font-title font-bold text-gray-900 text-lg mb-1
                               group-hover:text-blue-600 transition leading-tight">
                        {{ $lm->name }}
                    </h3>
                    <p class="text-gray-500 text-sm flex items-center gap-1.5 mb-3">
                        <i class="fa-solid fa-location-dot text-blue-500 text-xs"></i>
                        {{ $lm->location }}
                    </p>
                    <p class="text-gray-600 text-sm line-clamp-2 leading-relaxed mb-4">
                        {{ $lm->description }}
                    </p>
                    <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                        <span class="text-blue-600 text-sm font-semibold
                                     flex items-center gap-1 group-hover:gap-2 transition-all">
                            View Details
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </span>
                        <span class="text-xs text-gray-400">
                            {{ ucfirst($lm->country) }}
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        {{-- Clear All Button --}}
        <div class="mt-10 text-center">
            <a href="{{ route('home') }}"
               class="inline-flex items-center gap-2 bg-gray-100 text-gray-600
                      px-6 py-2.5 rounded-full text-sm font-semibold
                      hover:bg-gray-200 transition">
                <i class="fa-solid fa-house text-xs"></i>
                Back to Home
            </a>
        </div>
    @endif
</div>

@endsection