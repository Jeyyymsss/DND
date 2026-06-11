<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DND</title>
    <!-- Favicon / Tab icon -->
    <link rel="icon" href="{{ asset('logo.jpg') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('logo.jpg') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Archivo font (Bold) -->
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
            font-size: 18px;
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



    <main class="relative h-screen">

        <!-- Fullscreen background video (place your video at public/videos/DND_TEST.mp4) -->
        <video id="bg-video" autoplay muted loop playsinline crossorigin="anonymous">
            <source src="{{ asset('DND TEST.mp4') }}" type="video/mp4">
            <!-- Fallback image -->
            <img src="{{ asset('logo.png') }}" alt="Background">
        </video>
        <!-- Vertical sidebar on md+, collapsible on small screens -->
        <div class="absolute inset-0 flex items-center justify-center px-4">
            <button id="welcome-nav-toggle" class="md:hidden absolute top-6 left-4 z-50 p-2 rounded bg-white/10 hover:bg-white/20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>

            <aside id="welcome-sidebar" class="fixed left-0 top-0 h-full w-56 bg-transparent z-40 transform -translate-x-full md:translate-x-0 transition-transform duration-200">
                <div class="h-full flex flex-col items-center pt-24 gap-6">
                    <img src="{{ asset('dnd_oldlogo-removebg.png') }}" alt="DND Logo" class="w-36 max-w-full h-auto">

                    <nav class="flex flex-col items-center gap-4 mt-6">
                        <a href="{{ route('shirt-collections') }}" class="w-full text-center px-4 py-2 hover:bg-white/5 rounded">COLLECTIONS</a>
                        <a href="{{ route('shop') }}" class="w-full text-center px-4 py-2 hover:bg-white/5 rounded">SHOP</a>
                        <a href="{{ route('help') }}" class="w-full text-center px-4 py-2 hover:bg-white/5 rounded">HELP</a>
                        <a href="{{ route('contact') }}" class="w-full text-center px-4 py-2 hover:bg-white/5 rounded">CONTACT</a>
                    </nav>
                </div>
            </aside>

            <!-- Center content shifts right on md to accommodate sidebar -->
            <div class="md:pl-56 w-full flex items-center justify-center">
                <nav class="flex flex-col items-center gap-4 md:hidden">
                    <img src="{{ asset('dnd_oldlogo-removebg.png') }}" alt="DND Logo" class="w-40 max-w-full h-auto">
                    <a href="{{ route('shirt-collections') }}" class="px-4 py-2">COLLECTIONS</a>
                    <a href="{{ route('shop') }}" class="px-4 py-2">SHOP</a>
                    <a href="{{ route('help') }}" class="px-4 py-2">HELP</a>
                    <a href="{{ route('contact') }}" class="px-4 py-2">CONTACT</a>
                </nav>
            </div>
        </div>

    </main>
    <footer class="w-full p-6 flex justify-end items-center z-50">
        <button
            class="bg-white text-black hover:bg-amber-100 font-sans font-medium text-xs py-2.5 px-4 rounded-full flex items-center space-x-2 shadow-xl transition-all duration-300 hover:scale-105 active:scale-95 relative">
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

</body>

</html>
