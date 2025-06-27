<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Blog | Lan Pya</title>
    
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
                <a href="{{ route('login') }}" class="hover:text-blue-400 text-gray-200">
                    Log in
                </a>
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
        <!-- Hero Section -->
        <div class="mt-16 mb-16">
            <h1 class="text-6xl md:text-7xl font-semibold text-blue-400 mb-4 drop-shadow-lg">
                Learn. Grow. Succeed.
            </h1>

            <p class="text-2xl md:text-3xl text-gray-300 mb-8 font-normal">
                Explore Our Learning Hub
            </p>
            <p class="text-lg text-gray-400 max-w-2xl mx-auto mb-12 leading-relaxed">
                Our learning hub is designed to help you learn new skills and advance your knowledge through blog posts, videos, podcasts, and articles—focusing on career development for Myanmar Youth.
            </p>
        </div>

        <!-- Blog Cards Section -->
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 mb-24">
            <!-- Card 1 -->
            <div class="bg-gray-800 rounded-2xl shadow-md overflow-hidden border border-gray-600">
                <img src="https://imgs.search.brave.com/WQJnW3D98N_gzuTwOT39t45kWvptuVHatxUKsfMCDI8/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWcu/ZnJlZXBpay5jb20v/ZnJlZS1waG90by95/b3V0aC1jdWx0dXJl/LXlvdW5nLWFkdWx0/LWdlbmVyYXRpb24t/dGVlbmFnZXJzXzUz/ODc2LTEzODQ4Lmpw/Zz9zZW10PWFpc19o/eWJyaWQmdz03NDA" alt="Career for Youth" class="w-full h-48 object-cover">
                <div class="p-6 text-left">
                    <h2 class="text-xl font-semibold text-blue-300 mb-2">How Career is Vital for Youth</h2>
                    <p class="text-gray-400 mb-4">
                        Discover why career planning is essential for Myanmar youth and how it can shape their future.
                    </p>
                    <a href="{{ route('blog.how-career-is-vital-for-youth')}}" class="inline-block text-sm px-4 py-2 rounded-lg bg-blue-500 text-white hover:bg-blue-600 transition duration-300">
                        Read More
                    </a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-gray-800 rounded-2xl shadow-md overflow-hidden border border-gray-600">
                <img src="https://imgs.search.brave.com/WUX_fQbuAsvYuNpq6XaQ-6YRxXVy2-PmhDMsEv-gYMY/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWcu/ZnJlZXBpay5jb20v/ZnJlZS12ZWN0b3Iv/d29ybGQteW91dGgt/c2tpbGxzLWRheS1j/b25jZXB0LWlsbHVz/dHJhdGlvbl8xMTQz/NjAtNjA2OC5qcGc_/c2VtdD1haXNfaHli/cmlkJnc9NzQw" alt="Soft Skills" class="w-full h-48 object-cover">
                <div class="p-6 text-left">
                    <h2 class="text-xl font-semibold text-blue-300 mb-2">Top Soft Skills for Career Success</h2>
                    <p class="text-gray-400 mb-4">
                        Learn the essential soft skills employers look for in young professionals and how to develop them.
                    </p>
                    <a href="{{ route ('blog.top-soft-skills-for-career-success')}}" class="inline-block text-sm px-4 py-2 rounded-lg bg-blue-500 text-white hover:bg-blue-600 transition duration-300">
                        Read More
                    </a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-gray-800 rounded-2xl shadow-md overflow-hidden border border-gray-600">
                <img src="https://imgs.search.brave.com/Ph6p38lQRSSm0tNKaXvSf0LrrHXBUm5Hg3a3LxgerY4/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly90NC5m/dGNkbi5uZXQvanBn/LzE0LzE0LzA0LzYx/LzM2MF9GXzE0MTQw/NDYxMDJfRmh6Nlh6/UXNXM3RPNXE0YXVx/RUVWcXE3bXFLTG5L/bTUuanBn" alt="Interview Tips" class="w-full h-48 object-cover">
                <div class="p-6 text-left">
                    <h2 class="text-xl font-semibold text-blue-300 mb-2">Interview Tips for First Job Seekers</h2>
                    <p class="text-gray-400 mb-4">
                        Prepare for your first job interview with practical advice and real-life scenarios to boost confidence.
                    </p>
                    <a href="{{ route('blog.interview-tips-for-first-job-seekers')}}" class="inline-block text-sm px-4 py-2 rounded-lg bg-blue-500 text-white hover:bg-blue-600 transition duration-300">
                        Read More
                    </a>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-gray-800 rounded-2xl shadow-md overflow-hidden border border-gray-600">
                <img src="https://imgs.search.brave.com/avm1ht6PMMZWPww2FtJQAZaUzbJHVV0JtFJxMN6Tlqg/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWFn/ZXMuY3RmYXNzZXRz/Lm5ldC83dGh2enJz/OTNkdmYvNVJ6U2ha/YmlyeXlvVk5lRFFa/RHkxYi9mOTMyYjNl/ZTdiZDI2OTgzZWFj/Y2EwMjNhNzRkODBi/OS8xM19iZXN0X2Nh/cmVlcl9wb2RjYXN0/c195b3Vfc2hvdWxk/X2JlX2xpc3Rlbmlu/Z190b19tYWluX2lt/YWdlLmpwZw" alt="Podcast Learning" class="w-full h-48 object-cover">
                <div class="p-6 text-left">
                    <h2 class="text-xl font-semibold text-blue-300 mb-2">Podcasts to Inspire Your Career Path</h2>
                    <p class="text-gray-400 mb-4">
                        Tune in to inspiring podcasts that provide insights from professionals and changemakers.
                    </p>
                    <a href="{{ route('blog.podcasts-to-inspire-your-career') }}" class="inline-block text-sm px-4 py-2 rounded-lg bg-blue-500 text-white hover:bg-blue-600 transition duration-300">
                        Read More
                    </a>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="bg-gray-800 rounded-2xl shadow-md overflow-hidden border border-gray-600">
                <img src="https://imgs.search.brave.com/l8ZdgFzgxG-EIrw5YIaV11lqLahnCpS3PuQdwcsjwls/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWcu/ZnJlZXBpay5jb20v/cHJlbWl1bS1waG90/by9vbmxpbmUtY291/cnNlLWUtbGVhcm5p/bmctb25saW5lLWVk/dWNhdGlvbl80OTMz/NDMtNDU4MTcuanBn/P3NlbXQ9YWlzX2h5/YnJpZA" alt="Online Courses" class="w-full h-48 object-cover">
                <div class="p-6 text-left">
                    <h2 class="text-xl font-semibold text-blue-300 mb-2">Free Online Courses for Beginners</h2>
                    <p class="text-gray-400 mb-4">
                        Explore a curated list of free and useful online courses ideal for Myanmar youth.
                    </p>
                    <a href="{{ route('blog.free-online-courses-for-beginners')}}" class="inline-block text-sm px-4 py-2 rounded-lg bg-blue-500 text-white hover:bg-blue-600 transition duration-300">
                        Read More
                    </a>
                </div>
            </div>
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
</body>
</html>