<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Lan Pya') }}</title>

        <!-- ✅ Meta Tags for SEO -->
        <meta name="description" content="Lan Pya is a youth-driven platform empowering Myanmar learners and job seekers through mentorship, career guidance, and skill development.">
        <meta name="keywords" content="Lan Pya, Myanmar Mentorship, Youth Empowerment, Career Guidance, Education Platform, Mentors, Learning">
        <meta name="author" content="Lan Pya Team">
        <meta name="robots" content="index, follow">

        <!-- ✅ Open Graph Tags -->
        <meta property="og:title" content="Lan Pya – Empowering Myanmar Youth through Mentorship & Learning">
        <meta property="og:description" content="Connect with mentors, discover your career path, and grow with Lan Pya, a platform designed to uplift Myanmar youth.">
        <meta property="og:image" content="{{ asset('favicon.png') }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Lan Pya">

        <!-- ✅ Twitter Card Tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Lan Pya – Mentorship for Myanmar Youth">
        <meta name="twitter:description" content="Join Lan Pya for career growth, mentorship, and lifelong learning opportunities tailored for Myanmar youth.">
        <meta name="twitter:image" content="{{ asset('favicon.png') }}">

        <!-- ✅ Favicon -->
        <link rel="icon" href="{{ asset('assets/logo/lanpya-top.png') }}" type="image/png" sizes="192x192">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
