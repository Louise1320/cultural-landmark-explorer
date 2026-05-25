<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title', 'Cultural Landmark Explorer')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1D4ED8',
                        danger:  '#DC2626',
                    },
                    fontFamily: {
                        sans:  ['Inter', 'sans-serif'],
                        title: ['Poppins', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            background: #ffffff;
            color: #1E293B;
        }

        /* ── Navbar ── */
        .navbar {
            background: linear-gradient(90deg, #1E3A8A 0%, #1D4ED8 55%, #DC2626 100%);
        }

        /* ── Hero ── */
        .hero-bg {
            background: linear-gradient(135deg, #1E3A8A 0%, #1D4ED8 55%, #7C3AED 100%);
        }

        /* ── Cards ── */
        .landmark-card {
            transition: transform .3s ease, box-shadow .3s ease;
        }
        .landmark-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 24px 48px rgba(29,78,216,.15);
        }

        /* ── Badges ── */
        .badge-kh { background: #1D4ED8; color: #fff; }
        .badge-ph { background: #DC2626; color: #fff; }
        .cat-historical { background: #DBEAFE; color: #1D4ED8; }
        .cat-natural    { background: #DCFCE7; color: #166534; }
        .cat-religious  { background: #FEE2E2; color: #991B1B; }

        /* ── Carousel ── */
        .carousel-container { overflow: hidden; }
        .carousel-track {
            display: flex;
            transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        .carousel-slide { flex: 0 0 calc(33.333% - 16px); margin-right: 24px; }

        @media (max-width: 768px) {
            .carousel-slide { flex: 0 0 calc(100% - 16px); }
        }
        @media (min-width: 769px) and (max-width: 1024px) {
            .carousel-slide { flex: 0 0 calc(50% - 16px); }
        }

        /* ── Dot indicator ── */
        .dot { transition: all .3s ease; }
        .dot.active { background: #1D4ED8; width: 24px; border-radius: 4px; }

        /* ── Scrollbar ── */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #F1F5F9; }
        ::-webkit-scrollbar-thumb { background: #1D4ED8; border-radius: 3px; }

        /* ── Fade In ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up { animation: fadeUp .6s ease both; }
        .fade-up-2 { animation: fadeUp .6s .15s ease both; }
        .fade-up-3 { animation: fadeUp .6s .3s ease both; }

        /* ── Hero image overlay ── */
        .hero-img-overlay {
            background: linear-gradient(
                to right,
                rgba(30, 58, 138, 0.92) 0%,
                rgba(29, 78, 216, 0.85) 50%,
                rgba(29, 78, 216, 0.4) 100%
            );
        }

        /* ── Country hero with image ── */
        .country-hero {
            position: relative;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .country-hero-overlay {
            position: absolute;
            inset: 0;
        }
        .cambodia-overlay {
            background: linear-gradient(
                to right,
                rgba(30, 58, 138, 0.88) 0%,
                rgba(29, 78, 216, 0.75) 60%,
                rgba(29, 78, 216, 0.3) 100%
            );
        }
        .philippines-overlay {
            background: linear-gradient(
                to right,
                rgba(153, 27, 27, 0.88) 0%,
                rgba(220, 38, 38, 0.75) 60%,
                rgba(220, 38, 38, 0.3) 100%
            );
        }

        /* ── Search input focus ── */
        .search-input:focus { outline: none; border-color: #1D4ED8; box-shadow: 0 0 0 3px rgba(29,78,216,0.1); }

        /* ── Filter pills ── */
        .filter-pill { transition: all .2s ease; }
        .filter-pill:hover { transform: translateY(-1px); }

        /* ── Fav ── */
        .fav-active { color: #DC2626 !important; }
        /* ══ DARK MODE ══ */
.dark body { background: #0F172A; color: #E2E8F0; }
.dark .navbar { background: linear-gradient(90deg, #0F172A 0%, #1E3A8A 55%, #991B1B 100%); }
.dark .bg-white { background: #1E293B !important; }
.dark .bg-gray-50 { background: #1E293B !important; }
.dark .bg-gray-100 { background: #334155 !important; }
.dark .text-gray-900 { color: #F1F5F9 !important; }
.dark .text-gray-800 { color: #E2E8F0 !important; }
.dark .text-gray-700 { color: #CBD5E1 !important; }
.dark .text-gray-600 { color: #94A3B8 !important; }
.dark .text-gray-500 { color: #64748B !important; }
.dark .border-gray-100 { border-color: #334155 !important; }
.dark .border-gray-200 { border-color: #334155 !important; }
.dark .shadow-sm { box-shadow: 0 1px 3px rgba(0,0,0,0.4) !important; }
.dark .bg-red-50 { background: #450a0a !important; }
.dark .bg-blue-50 { background: #0c1a3a !important; }
.dark footer { background: #020617 !important; }

/* ══ SMOOTH PAGE TRANSITIONS ══ */
.page-transition {
    animation: pageIn 0.4s ease both;
}
@keyframes pageIn {
    from { opacity: 0; transform: translateY(12px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* ══ SKELETON LOADING ══ */
.skeleton {
    background: linear-gradient(90deg, #e2e8f0 25%, #f1f5f9 50%, #e2e8f0 75%);
    background-size: 200% 100%;
    animation: shimmer 1.5s infinite;
    border-radius: 8px;
}
.dark .skeleton {
    background: linear-gradient(90deg, #1e293b 25%, #334155 50%, #1e293b 75%);
    background-size: 200% 100%;
}
@keyframes shimmer {
    0%   { background-position: 200% 0; }
    100% { background-position: -200% 0; }
}

/* ══ BACK TO TOP ══ */
#back-to-top {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    z-index: 999;
    width: 44px;
    height: 44px;
    background: linear-gradient(135deg, #1D4ED8, #7C3AED);
    color: white;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 15px rgba(29,78,216,0.4);
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.3s ease, transform 0.3s ease;
    pointer-events: none;
}
#back-to-top.visible {
    opacity: 1;
    transform: translateY(0);
    pointer-events: all;
}
#back-to-top:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(29,78,216,0.5);
}

/* ══ DARK MODE TOGGLE BUTTON ══ */
#dark-toggle {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: rgba(255,255,255,0.15);
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    transition: background 0.2s ease;
    flex-shrink: 0;
}
#dark-toggle:hover { background: rgba(255,255,255,0.25); }
    </style>

    @stack('styles')
</head>
{{-- PWA --}}
<link rel="manifest" href="/manifest.json" />
<meta name="theme-color" content="#1D4ED8" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="default" />
<meta name="apple-mobile-web-app-title" content="Landmarks" />
<body class="min-h-screen flex flex-col">

    {{-- ══ NAVBAR ══ --}}
    <nav class="navbar shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 gap-4">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-3 flex-shrink-0 group">
                    <div class="w-9 h-9 bg-white/20 rounded-xl flex items-center justify-center
                                group-hover:bg-white/30 transition">
                        <i class="fa-solid fa-landmark text-white"></i>
                    </div>
                    <div class="leading-tight">
                        <p class="text-white font-bold text-sm font-title">Cultural</p>
                        <p class="text-blue-200 text-xs">Landmark Explorer</p>
                    </div>
                </a>

                {{-- Desktop Links --}}
                <div class="hidden md:flex items-center gap-1">
                    <a href="{{ route('home') }}"
                       class="flex items-center gap-1.5 text-white/80 hover:text-white hover:bg-white/10
                              px-3 py-2 rounded-lg transition text-sm font-medium">
                        <i class="fa-solid fa-house text-xs"></i> Home
                    </a>
                    <a href="{{ route('country.show', 'cambodia') }}"
                       class="flex items-center gap-1.5 text-white/80 hover:text-white hover:bg-white/10
                              px-3 py-2 rounded-lg transition text-sm font-medium">
                        <span class="bg-white/20 text-white text-xs font-bold px-1.5 py-0.5 rounded">KH</span>
                        Cambodia
                    </a>
                    <a href="{{ route('country.show', 'philippines') }}"
                       class="flex items-center gap-1.5 text-white/80 hover:text-white hover:bg-white/10
                              px-3 py-2 rounded-lg transition text-sm font-medium">
                        <span class="bg-white/20 text-white text-xs font-bold px-1.5 py-0.5 rounded">PH</span>
                        Philippines
                    </a>
                    <a href="{{ route('favorites.index') }}"
                       class="flex items-center gap-1.5 text-white/80 hover:text-white hover:bg-white/10
                              px-3 py-2 rounded-lg transition text-sm font-medium">
                        <i class="fa-solid fa-heart text-red-300 text-xs"></i> Favorites
                    </a>
                </div>

                {{-- Search Bar --}}
                <form action="{{ route('search') }}" method="GET"
                      class="hidden lg:flex items-center flex-1 max-w-xs">
                    <div class="relative w-full">
                        <input type="text" name="q"
                               value="{{ request('q') }}"
                               placeholder="Search landmarks..."
                               class="w-full bg-white/15 text-white placeholder-white/50 text-sm
                                      rounded-full px-4 py-2 pr-10 border border-white/25
                                      focus:outline-none focus:bg-white/25 focus:border-white/50
                                      transition" />
                        <button type="submit"
                                class="absolute right-3 top-1/2 -translate-y-1/2
                                       text-white/60 hover:text-white transition">
                            <i class="fa-solid fa-magnifying-glass text-sm"></i>
                        </button>
                    </div>
                </form>

                {{-- Mobile btn --}}
                <button id="mob-btn" class="md:hidden text-white p-2 rounded-lg hover:bg-white/10">
                    <i class="fa-solid fa-bars"></i>
                </button>
                {{-- Dark Mode Toggle ← IDUGANG DIRI --}}
<button id="dark-toggle" title="Toggle Dark Mode">
    <i class="fa-solid fa-moon text-sm" id="dark-icon"></i>
</button>
            </div>

            {{-- Mobile Menu --}}
            <div id="mob-menu" class="md:hidden hidden pb-4 pt-3 border-t border-white/20">
                <div class="flex flex-col gap-2">
                    <a href="{{ route('home') }}" class="text-white/80 hover:text-white px-3 py-2 rounded-lg hover:bg-white/10 text-sm">
                        <i class="fa-solid fa-house mr-2"></i>Home
                    </a>
                    <a href="{{ route('country.show','cambodia') }}" class="text-white/80 hover:text-white px-3 py-2 rounded-lg hover:bg-white/10 text-sm">
                        🇰🇭 Cambodia
                    </a>
                    <a href="{{ route('country.show','philippines') }}" class="text-white/80 hover:text-white px-3 py-2 rounded-lg hover:bg-white/10 text-sm">
                        🇵🇭 Philippines
                    </a>
                    <a href="{{ route('favorites.index') }}" class="text-white/80 hover:text-white px-3 py-2 rounded-lg hover:bg-white/10 text-sm">
                        ❤️ Favorites
                    </a>
                    <form action="{{ route('search') }}" method="GET" class="px-3 mt-1">
                        <input type="text" name="q" placeholder="Search landmarks..."
                               class="w-full bg-white/15 text-white placeholder-white/50 rounded-lg px-3 py-2 text-sm border border-white/25 focus:outline-none" />
                    </form>
                </div>
            </div>
        </div>
    </nav>

    {{-- MAIN --}}
<main class="flex-1 page-transition">
    @yield('content')
</main>
    {{-- ══ FOOTER ══ --}}
    <footer class="bg-gray-900 text-white mt-20">
        <div class="max-w-7xl mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center">
                            <i class="fa-solid fa-landmark text-white"></i>
                        </div>
                        <div>
                            <p class="font-bold font-title">Cultural Landmark Explorer</p>
                            <p class="text-gray-400 text-xs">KH Cambodia × PH Philippines</p>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        An interactive, visual & educational platform to explore
                        famous cultural landmarks from Cambodia and the Philippines.
                    </p>
                </div>

                <div>
                    <h3 class="font-semibold text-sm uppercase tracking-wider text-gray-400 mb-4">
                        Explore
                    </h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition">🏠 Home</a></li>
                        <li><a href="{{ route('country.show','cambodia') }}" class="text-gray-400 hover:text-white transition">🇰🇭 Cambodia</a></li>
                        <li><a href="{{ route('country.show','philippines') }}" class="text-gray-400 hover:text-white transition">🇵🇭 Philippines</a></li>
                        <li><a href="{{ route('favorites.index') }}" class="text-gray-400 hover:text-white transition">❤️ My Favorites</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-semibold text-sm uppercase tracking-wider text-gray-400 mb-4">
                        Categories
                    </h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('search', ['category'=>'Historical']) }}" class="text-gray-400 hover:text-white transition">🏛️ Historical</a></li>
                        <li><a href="{{ route('search', ['category'=>'Natural']) }}" class="text-gray-400 hover:text-white transition">🌿 Natural</a></li>
                        <li><a href="{{ route('search', ['category'=>'Religious']) }}" class="text-gray-400 hover:text-white transition">🕌 Religious</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-10 pt-6 flex flex-col md:flex-row
                        items-center justify-between gap-3">
                <p class="text-gray-600 text-xs">
                    © {{ date('Y') }} Cultural Landmark Explorer · Group 2 — NMU-DSSC Project
                </p>
                <p class="text-gray-700 text-xs font-mono">
                    v1.0 | main ✓ | KH × PH
                </p>
            </div>
        </div>
    </footer>

    
    {{-- BACK TO TOP --}}
<button id="back-to-top" title="Back to top">
    <i class="fa-solid fa-arrow-up text-sm"></i>
</button>

<script>
    // ══ MOBILE MENU ══
    document.getElementById('mob-btn').addEventListener('click', () => {
        document.getElementById('mob-menu').classList.toggle('hidden');
    });

    // ══ BACK TO TOP ══
    const backToTop = document.getElementById('back-to-top');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            backToTop.classList.add('visible');
        } else {
            backToTop.classList.remove('visible');
        }
    });
    backToTop.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // ══ DARK MODE ══
    const darkToggle = document.getElementById('dark-toggle');
    const darkIcon   = document.getElementById('dark-icon');
    const html       = document.documentElement;

    // Load saved preference
    if (localStorage.getItem('darkMode') === 'true') {
        html.classList.add('dark');
        darkIcon.className = 'fa-solid fa-sun text-sm';
    }

    darkToggle.addEventListener('click', () => {
        html.classList.toggle('dark');
        const isDark = html.classList.contains('dark');
        localStorage.setItem('darkMode', isDark);
        darkIcon.className = isDark
            ? 'fa-solid fa-sun text-sm'
            : 'fa-solid fa-moon text-sm';
    });

    // ══ SKELETON LOADING ══
    // Auto-apply sa landmark cards pag mag-load
    document.addEventListener('DOMContentLoaded', () => {
        const images = document.querySelectorAll('img');
        images.forEach(img => {
            if (!img.complete) {
                img.closest('.landmark-card')?.classList.add('skeleton-loading');
                img.addEventListener('load', () => {
                    img.closest('.landmark-card')?.classList.remove('skeleton-loading');
                });
            }
        });
    });
</script>


<script>
if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/sw.js')
        .then(() => console.log('SW registered'))
        .catch(err => console.log('SW error:', err));
}
</script>
    @stack('scripts')
</body>
</html>