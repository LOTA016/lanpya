<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>

    <footer class="mt-16 bg-gradient-to-br from-gray-800 via-gray-900 to-gray-800 text-gray-300 text-center px-6 py-10 rounded-t-3xl shadow-inner">
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
    </footer>
</x-app-layout>
