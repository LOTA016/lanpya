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
    <header class="w-full max-w-4xl mb-8 text-sm flex items-center justify-between">
        @if (Route::has('login'))
            <div class="flex items-center gap-4">
                <!-- Language Selector -->
                <select onchange="location = this.value" class="text-sm bg-gray-700 text-white rounded px-2 py-1">
                    <option value="{{ url('en') }}" {{ app()->getLocale() === 'en' ? 'selected' : '' }}>English</option>
                    <option value="{{ url('my') }}" {{ app()->getLocale() === 'my' ? 'selected' : '' }}>မြန်မာ</option>
                </select>
            </div>
            
            <div class="flex items-center gap-4">
                <!-- Navigation Links -->
                @auth
                    <a href="{{ url('/dashboard') }}" class="inline-block px-5 py-1.5 border border-gray-600 text-gray-200 rounded-sm text-sm hover:border-gray-500 transition-colors">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="inline-block px-5 py-1.5 text-gray-200 border border-transparent rounded-sm text-sm hover:border-gray-600 transition-colors">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="inline-block px-5 py-1.5 border border-gray-600 text-gray-200 rounded-sm text-sm hover:border-gray-500 transition-colors">
                            Register
                        </a>
                    @endif
                @endauth
            </div>
        @endif
    </header>

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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
            <div class="bg-gray-700 bg-opacity-80 border border-gray-600 rounded-lg p-8 transition-all duration-300 hover:-translate-y-1 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-400/10">
                <div class="text-4xl mb-4">📚</div>
                <h3 class="text-xl font-semibold text-gray-200 mb-3">Quality Education</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Access expertly curated courses and learning materials designed by industry professionals 
                    to help you master new skills and advance your knowledge.
                </p>
            </div>
            
            <div class="bg-gray-700 bg-opacity-80 border border-gray-600 rounded-lg p-8 transition-all duration-300 hover:-translate-y-1 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-400/10">
                <div class="text-4xl mb-4">💼</div>
                <h3 class="text-xl font-semibold text-gray-200 mb-3">Career Development</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Get personalized career guidance, resume building tools, and connect with potential 
                    employers to accelerate your professional growth.
                </p>
            </div>
            
            <div class="bg-gray-700 bg-opacity-80 border border-gray-600 rounded-lg p-8 transition-all duration-300 hover:-translate-y-1 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-400/10">
                <div class="text-4xl mb-4">🌐</div>
                <h3 class="text-xl font-semibold text-gray-200 mb-3">Global Community</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Join our vibrant community of learners and professionals from around the world. 
                    Network, collaborate, and grow together.
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