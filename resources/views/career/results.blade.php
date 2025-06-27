<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            {{ __('Career Suggestions') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto p-6">
        <div class="bg-white p-4 rounded shadow mb-6">
            <h3 class="text-lg font-bold mb-2">Your Career Suggestions</h3>
            <div class="prose max-w-none text-gray-800">
                {!! nl2br(e($suggestions)) !!}
            </div>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-lg font-bold mb-4">Suggested Mentors</h3>
            @forelse ($mentors as $mentor)
                <div class="border-b pb-3 mb-3">
                    <h4 class="text-md font-semibold">{{ $mentor->name }} ({{ $mentor->profession }})</h4>
                    <p class="text-sm text-gray-700">{{ $mentor->bio }}</p>
                    <p class="text-xs text-blue-600">{{ $mentor->language }}</p>
                    <div class="mt-1 text-sm text-gray-600">
                        {!! nl2br(e($mentor->social_links)) !!}
                    </div>
                </div>
            @empty
                <p>No mentors found for your selected language.</p>
            @endforelse
        </div>

        <!-- <div class="text-center mt-6">
            <a href="{{ route('career.income') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                {{ $language === 'my' ? 'သင့်အလုပ်အကိုင်အတွက် ဝင်ငွေကို နှိုင်းယှဉ်ကြည့်မယ်' : 'Compare Income for Suggested Careers' }}
            </a>
        </div> -->
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
