<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Contact | Lan Pya</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            'sans': ['Instrument Sans', 'sans-serif'],
                        }
                    }
                }
            }
        </script>
    @endif
</head>
<body class="font-sans leading-relaxed text-gray-200 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 min-h-screen flex flex-col items-center justify-center p-8">
    <!-- Responsive Header -->
    <header class="w-full max-w-6xl mx-auto px-4 py-4 text-sm">
    @if (Route::has('login'))

    <!-- Top Bar -->
    <div class="flex justify-between items-center md:flex-row flex-wrap gap-4">
        <!-- Home Component -->
        <div class="flex items-center gap-4">
            <x-home />
        </div>

        <!-- Hamburger Button -->
        <button id="hamburger-button" class="md:hidden p-2 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Collapsible Navigation Menu -->
    <div id="mobile-menu" class="hidden md:flex flex-col md:flex-row md:items-center md:justify-between mt-4 md:mt-2 space-y-4 md:space-y-0">
        <!-- Page Links -->
        <div class="flex flex-col md:flex-row gap-2 md:gap-4">
            <a href="{{ route('about') }}" class="text-gray-200 hover:text-blue-400">About</a>
            <a href="{{ route('blog.index') }}" class="text-gray-200 hover:text-blue-400">Blogs</a>
            <a href="{{ route('contact') }}" class="text-gray-200 hover:text-blue-400">Contact</a>
            <a href="{{ route('podcasts') }}" class="text-gray-200 hover:text-blue-400">Podcasts</a>
            <a href="{{ route('privacy') }}" class="text-gray-200 hover:text-blue-400">Privacy</a>
        </div>

        <!-- Auth Buttons -->
        <div class="flex flex-col md:flex-row gap-2">
             @auth
                <a href="{{ url('/dashboard') }}" class="px-4 py-1.5 border border-gray-600 rounded-sm hover:border-gray-500 text-gray-200">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="px-4 py-1.5 hover:text-blue-400">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="px-4 py-1.5 border border-gray-600 rounded-sm hover:border-gray-500 text-gray-200">
                        Register
                    </a>
                @endif
            @endauth
        </div>
    </div>
    @endif
    </header>

    <!-- Toggle Script -->
    <script>
    document.getElementById('hamburger-button').addEventListener('click', function () {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
    </script>

    <div class="w-full max-w-6xl text-center">
        <!-- Contact Form -->
        <div class="mt-16 p-12 bg-gray-800 bg-opacity-80 rounded-2xl border border-gray-600">
            <h2 class="text-3xl font-semibold text-blue-400 mb-4">Get in Touch</h2>
            <p class="text-gray-300 text-lg mb-8">
                Let us know how we can help. We're all ears.
            </p>
            <form>
                <div class="mb-4 grid grid-cols-2 gap-4">
                    <input type="text" placeholder="Name" class="w-full p-4 border border-gray-600 rounded-lg transition duration-300 hover:border-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
                    <input type="email" placeholder="Email" class="w-full p-4 border border-gray-600 rounded-lg transition duration-300 hover:border-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
                </div>
                <textarea placeholder="Any Feedback or something you want us to know..." class="w-full p-4 border border-gray-600 rounded-lg transition duration-300 hover:border-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" rows="5"></textarea>
                <button type="submit" class="mt-4 px-4 py-1.5 border border-gray-600 rounded-sm hover:border-gray-500 text-gray-200">
                    Send
                </button>
            </form>
        </div>

        <!-- Call to Action Section -->
        <div class="mt-16 p-12 bg-gray-800 bg-opacity-80 rounded-2xl border border-gray-600">
            <h2 class="text-3xl font-semibold text-blue-400 mb-4">Ready to Transform Your Future?</h2>
            <p class="text-gray-300 text-lg mb-8">
                Take the first step towards achieving your educational and career goals with Lan Pya.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                @guest
                    <a href="{{ route('register') }}" class="inline-block px-8 py-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold rounded-lg transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-blue-500/40">
                        Get Started Today
                    </a>
                    <a href="{{ route('login') }}" class="inline-block px-8 py-3 bg-transparent text-gray-200 border border-gray-600 hover:bg-gray-700 hover:bg-opacity-50 hover:border-gray-500 font-semibold rounded-lg transition-all duration-300">
                        Sign In
                    </a>
                @else
                    <a href="{{ url('/dashboard') }}" class="inline-block px-8 py-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold rounded-lg transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-blue-500/40">
                        Go to Dashboard
                    </a>
                @endguest
            </div>
        </div>
    </div>
    <br><br><hr><br>
    <div class="text-base tracking-wide">
        &copy; 2025 <span class="font-semibold text-blue-400">Lan Pya</span>. All rights reserved.
    </div>

    <div class="mt-4 text-sm leading-relaxed">
        <p class="italic text-gray-400">"The best way to predict your future is to create it."</p>
        <p class="font-semibold text-blue-300 mt-1">— Abraham Lincoln</p>
    </div>

    <div class="mt-6 flex justify-center gap-4 text-gray-400 text-sm">
        <a href="{{ route('privacy') }}" class="hover:text-blue-400 transition">Privacy Policy</a>
        <a href="{{ route('blog.index') }}" class="hover:text-blue-400 transition">Blogs</a>
        <a href="{{ route('contact') }}" class="hover:text-blue-400 transition">Contact</a>
    </div>
</body>
</html>