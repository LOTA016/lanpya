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
    </div>
</x-app-layout>
