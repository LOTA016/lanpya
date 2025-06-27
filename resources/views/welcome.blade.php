<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('welcome.title') }}</title>
    
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
        <!-- Top bar -->
        <div class="flex justify-between items-center md:flex-row flex-wrap gap-4">
            <!-- Logo or title -->
            <div class="text-lg font-semibold text-blue-400">Lan Pya</div>

            <!-- Hamburger button (mobile only) -->
            <button id="hamburger-button" class="md:hidden p-2 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Collapsible Menu -->
        <div id="mobile-menu" class="hidden md:flex flex-col md:flex-row md:items-center md:justify-between mt-4 md:mt-2 space-y-4 md:space-y-0">
            <!-- Language Selector -->
            <div class="flex items-center gap-2">
                <select onchange="location = this.value" class="text-sm bg-gray-700 text-white rounded px-2 py-1">
                    <option value="{{ url('en') }}" {{ app()->getLocale() === 'en' ? 'selected' : '' }}>English</option>
                    <option value="{{ url('my') }}" {{ app()->getLocale() === 'my' ? 'selected' : '' }}>မြန်မာ</option>
                </select>
            </div>

            <!-- Main Links -->
            <nav class="flex flex-col md:flex-row gap-2 md:gap-4 text-gray-200">
                <a href="{{ route('about') }}" class="hover:text-blue-400">About</a>
                <a href="{{ route('blog.index') }}" class="hover:text-blue-400">Blogs</a>
                <a href="{{ route('contact') }}" class="hover:text-blue-400">Contact</a>
                <a href="{{ route('podcasts') }}" class="hover:text-blue-400">Podcasts</a>
                <a href="{{ route('privacy') }}" class="hover:text-blue-400">Privacy</a>
            </nav>

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
        <!-- Hero Section -->
        <div class="mt-16 mb-16">
            <h1 class="{{ app()->getLocale() === 'my' ? 'text-5xl leading-normal' : 'text-6xl' }} md:{{ app()->getLocale() === 'my' ? 'text-6xl' : 'text-7xl' }} font-semibold text-blue-400 mb-4 drop-shadow-lg">
                {{ __('welcome.title') }}
            </h1>

            <!-- <p>Current locale from session: {{ session('locale') }}</p>
            <p>Current app locale: {{ app()->getLocale() }}</p> -->

            <p class="text-2xl md:text-3xl text-gray-300 mb-8 font-normal">
                Empowering Education & Career Growth
            </p>
            <p class="text-lg text-gray-400 max-w-2xl mx-auto mb-12 leading-relaxed">
                Discover your potential with our comprehensive platform designed to bridge the gap between learning and career success. 
                Join thousands of learners and professionals advancing their skills and achieving their goals.
            </p>
        </div>

        <!-- Features Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-12">
            <div class="bg-gray-700 bg-opacity-80 border border-gray-600 rounded-lg p-8 transition-all duration-300 hover:-translate-y-1 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-400/10">
                <div class="text-4xl mb-4">🤖</div>
                <h3 class="text-xl font-semibold text-gray-200 mb-3">AI-Powered Personality & Career Test</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Take our AI-driven personality test and discover your ideal career pathway. 
                    Our algorithm considers your strengths, interests, and skills to recommend 
                    the best career fit for you.
                </p>
            </div>
            
            <div class="bg-gray-700 bg-opacity-80 border border-gray-600 rounded-lg p-8 transition-all duration-300 hover:-translate-y-1 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-400/10">
                <div class="text-4xl mb-4">👩‍🏫</div>
                <h3 class="text-xl font-semibold text-gray-200 mb-3">Mentors & Coaching</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Get personalized guidance from experienced mentors and coaches. 
                    Our mentors are industry experts who provide valuable insights and support 
                    to help you achieve your career goals.
                </p>
            </div>
            
            <div class="bg-gray-700 bg-opacity-80 border border-gray-600 rounded-lg p-8 transition-all duration-300 hover:-translate-y-1 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-400/10">
                <div class="text-4xl mb-4">📚</div>
                <h3 class="text-xl font-semibold text-gray-200 mb-3">Multimedia Learning Hub</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Access a vast library of multimedia learning resources, including videos, 
                    podcasts, articles, and more. Our learning hub is designed to help you 
                    learn new skills and advance your knowledge.
                </p>
            </div>
            
            <div class="bg-gray-700 bg-opacity-80 border border-gray-600 rounded-lg p-8 transition-all duration-300 hover:-translate-y-1 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-400/10">
                <div class="text-4xl mb-4">🌎</div>
                <h3 class="text-xl font-semibold text-gray-200 mb-3">Multilingual Support</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    As an open-source project, our platform supports multiple languages. 
                    This means that developers from any ethnic background can contribute to 
                    our project repository and help us make a positive impact globally.
                </p>
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
                    <a href="{{ route('career.form') }}" class="inline-block px-8 py-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold rounded-lg transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-blue-500/40">
                        Find Career Today
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