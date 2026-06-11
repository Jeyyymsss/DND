<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DND</title>
    <link rel="icon" href="http://localhost/logo.jpg" type="image/x-icon">
    <link rel="apple-touch-icon" href="http://localhost/logo.jpg">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@700&display=swap" rel="stylesheet">

    <style>
        /* Prevent page scrolling */
        html,
        body {
            height: 100%;
            overflow: auto;
        }

        .font-streetwear {
            font-family: 'Oswald', sans-serif;
            letter-spacing: 0.05em;
        }

        .font-logo {
            font-family: 'Playfair Display', serif;
        }

        .font-nav {
            font-family: 'Archivo', sans-serif;
            font-weight: 700;
            font-size: 16px;
            /* Slightly adjusted down for sleeker top nav alignment */
            letter-spacing: 0.15em;
        }

        /* Custom rich gradient matching Image 2 */
        .bg-gradient-dnd {
            background: radial-gradient(circle at center, #0e1e17 0%, #060a08 100%);
        }

        /* Fullscreen background video styling */
        #bg-video {
            position: fixed;
            top: 50%;
            left: 50%;
            width: 100vw;
            height: 100vh;
            transform: translate(-50%, -50%);
            object-fit: cover;
            z-index: -1;
            pointer-events: none;
        }
    </style>
</head>

<body
    class="bg-gradient-dnd text-white font-nav min-h-screen flex flex-col justify-between antialiased selection:bg-emerald-800 selection:text-white">

    <video id="bg-video" autoplay muted loop playsinline crossorigin="anonymous">
        <source src="/DND%20TEST.mp4" type="video/mp4">
    </video>

    <header
        class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center px-4 py-4 bg-gradient-to-b from-black/60 to-transparent backdrop-blur-xs">
        <div class="flex items-center w-full justify-between">
            <div class="flex items-center gap-4">
                <!-- Site logo small (keeps original look) -->
                <a href="{{ route('home') }}" class="hidden sm:block">
                    <img src="/logo.jpg" alt="logo" class="w-10 h-auto">
                </a>
            </div>

            <!-- Mobile menu button -->
            <button id="mobile-menu-button" class="md:hidden p-2 rounded bg-white/10 hover:bg-white/20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>

            <nav id="main-nav" class="hidden md:flex flex-row items-center gap-4 md:gap-10 flex-wrap overflow-auto">
                <a href="{{ route('shirt-collections') }}"
                    class="nav-link inline-block transform scale-y-[0.85] tracking-[0.25em] font-bold origin-center transition duration-200 hover:text-amber-100 whitespace-nowrap">
                    COLLECTION
                </a>

                <a href="{{ route('shop') }}"
                    class="nav-link inline-block transform scale-y-[0.85] tracking-[0.25em] font-bold origin-center transition duration-200 hover:text-amber-100 whitespace-nowrap">
                    SHOP
                </a>

                <a href="{{ route('help') }}"
                    class="nav-link inline-block transform scale-y-[0.85] tracking-[0.25em] font-bold origin-center transition duration-200 hover:text-amber-100 whitespace-nowrap">
                    HELP
                </a>

                <a href="{{ route('contact') }}"
                    class="nav-link inline-block transform scale-y-[0.85] tracking-[0.25em] font-bold origin-center transition duration-200 hover:text-amber-100 whitespace-nowrap">
                    CONTACT
                </a>
            </nav>
        </div>
    </header>

    <main class="relative flex-grow h-full">
        <div class="absolute inset-0 flex items-start justify-center z-20 pt-44 px-6 overflow-y-auto h-full">
            <div class="w-full max-w-7xl mx-auto">
            </div>
        </div>
    </main>

    <footer class="fixed bottom-0 left-0 right-0 p-6 flex justify-between items-center z-50 pointer-events-none">

        <!-- Back Button -->
        <a href="./"
            class="pointer-events-auto bg-white text-black hover:bg-amber-100 font-sans font-medium text-xs py-2.5 px-4 rounded-full flex items-center space-x-2 shadow-xl transition-all duration-300 hover:scale-105 active:scale-95 inline-flex">

            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                </path>
            </svg>

            <span
                class="tnav-link inline-block transform scale-y-[0.85] tracking-[0.25em] font-bold origin-center transition duration-200">
                Back
            </span>
        </a>

        <!-- Chat Button -->
        <button
            class="pointer-events-auto bg-white text-black hover:bg-amber-100 font-sans font-medium text-xs py-2.5 px-4 rounded-full flex items-center space-x-2 shadow-xl transition-all duration-300 hover:scale-105 active:scale-95 relative">

            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                </path>
            </svg>

            <span class="tracking-normal font-semibold">Chat</span>

            <span
                class="absolute -top-1.5 -right-1 flex h-4 w-4 items-center justify-center rounded-full bg-red-500 text-[9px] font-bold text-white ring-2 ring-emerald-950">
                1
            </span>
        </button>

    </footer>

    <script>
        (function() {
            const btn = document.getElementById('mobile-menu-button');
            const nav = document.getElementById('main-nav');
            if (!btn || !nav) return;
            btn.addEventListener('click', function() {
                if (nav.classList.contains('hidden')) {
                    nav.classList.remove('hidden');
                    nav.classList.add('block');
                } else {
                    nav.classList.add('hidden');
                    nav.classList.remove('block');
                }
            });
            // close on outside click
            document.addEventListener('click', function(e) {
                if (!nav.contains(e.target) && !btn.contains(e.target)) {
                    if (!nav.classList.contains('hidden')) {
                        nav.classList.add('hidden');
                        nav.classList.remove('block');
                    }
                }
            });
            // Welcome page sidebar toggle (if present)
            const wBtn = document.getElementById('welcome-nav-toggle');
            const wSidebar = document.getElementById('welcome-sidebar');
            if (wBtn && wSidebar) {
                wBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    if (wSidebar.classList.contains('-translate-x-full')) {
                        wSidebar.classList.remove('-translate-x-full');
                    } else {
                        wSidebar.classList.add('-translate-x-full');
                    }
                });
                document.addEventListener('click', function(e) {
                    if (!wSidebar.contains(e.target) && !wBtn.contains(e.target)) {
                        if (!wSidebar.classList.contains('-translate-x-full')) {
                            wSidebar.classList.add('-translate-x-full');
                        }
                    }
                });
            }
        })();
    </script>

</body>

</html>
