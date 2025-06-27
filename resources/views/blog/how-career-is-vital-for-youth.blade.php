<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Career Planning | Lan Pya</title>
    
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
                <!-- Home -->
                <x-home />
            </div>
            
            <div class="flex items-center gap-2">
                <a href="{{ route('about')}}" class="inline-block px-5 py-1.5 text-gray-200 border border-transparent rounded-sm text-sm hover:border-gray-600 transition-colors">
                    About
                </a>
                <a href="{{ route('blog.index') }}" class="inline-block px-5 py-1.5 text-gray-200 border border-transparent rounded-sm text-sm hover:border-gray-600 transition-colors">
                    Blogs
                </a>
                <a href="{{ route('contact') }}" class="inline-block px-5 py-1.5 text-gray-200 border border-transparent rounded-sm text-sm hover:border-gray-600 transition-colors">
                    Contact
                </a>
                <a href="{{ route('podcasts') }}" class="inline-block px-5 py-1.5 text-gray-200 border border-transparent rounded-sm text-sm hover:border-gray-600 transition-colors">
                    Podcasts
                </a>
                <a href="{{ route('privacy') }}" class="inline-block px-5 py-1.5 text-gray-200 border border-transparent rounded-sm text-sm hover:border-gray-600 transition-colors">
                    Privacy
                </a>
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
        <div class="flex justify-start">
            <a href="{{ route('blog.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                <- Back to Blog Posts
            </a>
        </div>
        <!-- Hero Section -->
        <div class="max-w-4xl mx-auto py-12 px-4 text-gray-300">
            <h1 class="text-4xl font-bold text-blue-400 mb-4">Why Career Planning is Vital for Myanmar Youth</h1>
            <p class="mb-6 text-lg">In Myanmar, the youth population is growing rapidly, with more than 70% of the population below the age of 30. This presents a significant opportunity for the country to harness the potential of its young people to drive economic growth and social development. However, without proper guidance and support, many young people struggle to find fulfilling and sustainable career paths.</p>

            <p class="mb-4">Career planning is a vital component of this process. By learning to identify strengths, explore opportunities, and set realistic goals, youth can build confidence and focus. Early planning encourages them to acquire useful skills, pursue higher education, or find vocational training that matches their passion.</p>

            <p class="mb-4">Moreover, career development supports social and economic mobility, empowering youth to contribute meaningfully to their communities. As young people gain skills and experience, they are more likely to participate in the formal economy, pay taxes, and contribute to the development of their communities. This, in turn, can help to break the cycle of poverty and inequality, promoting a more equitable and prosperous society.</p>

            <p class="mb-4">Despite its importance, career planning is often overlooked in Myanmar. Many young people lack access to career guidance and support, leaving them to navigate the complex and rapidly changing job market on their own. This can lead to a mismatch between the skills and qualifications that young people acquire, and the needs of the labor market.</p>

            <p class="mt-6 text-sm text-gray-400">Published: June 2025</p>
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