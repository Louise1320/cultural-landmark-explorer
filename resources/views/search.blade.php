@extends('layouts.app')
@section('title', 'Search — Cultural Landmark Explorer')

@section('content')

@php
// Image map para sa search results
$searchImages = [
    // Cambodia
    'angkor-wat'              => asset('images/landmarks/angkor-wat.jpg'),
    'bayon-temple'            => asset('images/landmarks/bayon-temple.jpg'),
    'royal-palace-phnom-penh' => asset('images/landmarks/royal-palace.jpg'),
    'phnom-kulen'             => asset('images/landmarks/phnom-kulen.jpg'),

    // PH Historical
    'intramuros'              => asset('images/landmarks/intramuros.jpg'),
    'rizal-park'              => asset('images/landmarks/rizal-park.jpg'),
    'fort-santiago'           => asset('images/landmarks/fort-santiago.jpg'),
    'corregidor-island'       => asset('images/landmarks/corregidor-island.jpeg'),
    'plaza-cuartel'              => asset('images/landmarks/plaza-cuartel.jpg'),
'guisi-lighthouse'           => asset('images/landmarks/guisi-lighthouse.jpg'),
'biak-na-bato-national-park' => asset('images/landmarks/biak-na-bato.jpg'),
'binondo-chinatown'          => asset('images/landmarks/binondo-chinatown.jpg'),
'leyte-landing-memorial'     => asset('images/landmarks/leyte-landing-memorial.jpg'),
'mount-samat-national-shrine'=> asset('images/landmarks/mount-samat-shrine.jpg'),
    'rizal-shrine'            => asset('images/landmarks/rizal-shrine.jpg'),
    'calle-crisologo-vigan'   => asset('images/landmarks/calle-crisologo.jpg'),
    'fort-san-pedro'          => asset('images/landmarks/fort-san-pedro.jpg'),
    'fort-pilar'              => asset('images/landmarks/fort-pilar.jpg'),
    'magellans-cross'         => asset('images/landmarks/magellans-cross.jpg'),
    'aguinaldo-shrine'        => asset('images/landmarks/aguinaldo-shrine.jpg'),

    // PH Natural
    'chocolate-hills'                   => asset('images/landmarks/chocolate-hills.jpg'),
    'mayon-volcano'                     => asset('images/landmarks/mayon-volcano.jpg'),
    'boracay'                           => asset('images/landmarks/boracay.jpg'),
    'puerto-princesa-underground-river' => asset('images/landmarks/puerto-princesa-underground-river.jpg'),
    'banaue-rice-terraces'              => asset('images/landmarks/banaue-rice-terraces.jpg'),
    'siargao-island'                    => asset('images/landmarks/siargao-island.jpg'),
    'mount-pinatubo'             => asset('images/landmarks/mount-pinatubo.jpg'),
'osmena-peak'                => asset('images/landmarks/osmena-peak.jpg'),
'hundred-islands-national-park'  => asset('images/landmarks/hundred-islands.jpg'),
'asik-asik-falls'            => asset('images/landmarks/asik-asik-falls.jpg'),
'barracuda-lake'             => asset('images/landmarks/barracuda-lake.jpg'),
'magpupungko-rock-pools'     => asset('images/landmarks/magpupungko-rock-pools.jpg'),
'biri-island-rock-formations'=> asset('images/landmarks/biri-rock-formations.jpg'),
'sabtang-batanes-island'     => asset('images/landmarks/sabtang-batanes.jpg'),
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

<div class="max-w-7xl mx-auto px-6 py-12">

    {{-- Header --}}
    <div class="mb-10">
        <span class="text-blue-600 font-mono text-sm tracking-widest uppercase font-bold">
            // search
        </span>
        <h1 class="font-title font-bold text-4xl text-gray-900 mt-1 mb-6">
            Search Landmarks
        </h1>

        {{-- Search Form --}}
        <form action="{{ route('search') }}" method="GET"
              class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <div class="md:col-span-1">
                    <label class="block text-xs font-semibold text-gray-500 uppercase mb-2">
                        Keyword
                    </label>
                    <input type="text" name="q"
                           value="{{ $term }}"
                           placeholder="e.g. Angkor Wat, Boracay..."
                           class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm
                                  focus:outline-none focus:border-blue-600 focus:ring-2
                                  focus:ring-blue-100 transition" />
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase mb-2">
                        Country
                    </label>
                    <select name="country"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm
                                   focus:outline-none focus:border-blue-600 transition">
                        <option value="">All Countries</option>
                        <option value="cambodia"
                            {{ $country === 'cambodia' ? 'selected' : '' }}>
                            🇰🇭 Cambodia
                        </option>
                        <option value="philippines"
                            {{ $country === 'philippines' ? 'selected' : '' }}>
                            🇵🇭 Philippines
                        </option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase mb-2">
                        Category
                    </label>
                    <select name="category"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm
                                   focus:outline-none focus:border-blue-600 transition">
                        <option value="">All Categories</option>
                        @foreach(['Historical','Natural','Religious'] as $cat)
                        <option value="{{ $cat }}"
                            {{ $category === $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-4 flex gap-3">
                <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2.5 rounded-xl text-sm
                               font-semibold hover:bg-blue-700 transition flex items-center gap-2">
                    <i class="fa-solid fa-magnifying-glass"></i> Search
                </button>
                <a href="{{ route('search') }}"
                   class="border border-gray-200 text-gray-600 px-6 py-2.5 rounded-xl
                          text-sm font-semibold hover:bg-gray-50 transition">
                    Clear
                </a>
            </div>
        </form>
    </div>

    {{-- Results Count --}}
    <p class="text-gray-500 text-sm mb-6">
        <span class="font-semibold text-gray-800">{{ $results->total() }}</span>
        result{{ $results->total() !== 1 ? 's' : '' }} found
        @if($term)
            for "<strong class="text-blue-600">{{ $term }}</strong>"
        @endif
    </p>

    {{-- Results --}}
    @if($results->isEmpty())
        <div class="text-center py-24 bg-white rounded-3xl border border-gray-100 shadow-sm">
            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center
                        justify-center mx-auto mb-5">
                <i class="fa-solid fa-magnifying-glass text-3xl text-gray-300"></i>
            </div>
            <p class="text-gray-500 text-lg font-medium mb-2">No landmarks found</p>
            <p class="text-gray-400 text-sm mb-6">Try a different keyword or filter</p>
            <a href="{{ route('search') }}"
               class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-2.5
                      rounded-full text-sm font-semibold hover:bg-blue-700 transition">
                Clear Search
            </a>
        </div>

    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7">
            @foreach($results as $lm)

            @php
                $cardImg = $searchImages[$lm->slug] ?? null;
                $isKH    = $lm->country === 'cambodia';
            @endphp

            <a href="{{ route('landmark.show', $lm->slug) }}"
               class="landmark-card bg-white rounded-2xl overflow-hidden shadow-sm
                      group block border border-gray-100">

                {{-- ══ IMAGE AREA ══ --}}
                <div class="h-52 relative overflow-hidden">

                    {{-- Fallback BG --}}
                    <div class="absolute inset-0 bg-gradient-to-br
                                {{ $isKH
                                   ? 'from-blue-100 to-blue-200'
                                   : 'from-slate-100 to-blue-100' }}
                                flex items-center justify-center">
                        <i class="fa-solid fa-landmark text-5xl
                                  {{ $isKH ? 'text-blue-300' : 'text-slate-300' }}"></i>
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
                    <span class="absolute top-4 left-4 z-20 text-xs font-bold px-2.5 py-1
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
                        <span class="text-blue-600 text-sm font-semibold flex items-center gap-1
                                     group-hover:gap-2 transition-all">
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

        {{-- Pagination --}}
        @if($results->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $results->links() }}
        </div>
        @endif
    @endif

</div>
@endsection