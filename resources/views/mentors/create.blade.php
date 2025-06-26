<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Add a Mentor</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto p-6 bg-white shadow rounded">
        @if (session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('mentors.store') }}">
            @csrf

            <x-label for="name" :value="'Name'" />
            <x-input name="name" class="w-full mb-4" required />

            <x-label for="profession" :value="'Profession'" />
            <x-input name="profession" class="w-full mb-4" required />

            <x-label for="bio" :value="'Bio'" />
            <textarea name="bio" class="w-full mb-4" required></textarea>

            <x-label for="language" :value="'Language'" />
            <select name="language" class="w-full mb-4" required>
                <option value="en">English</option>
                <option value="my">Myanmar</option>
            </select>

            <x-label for="social_links" :value="'Social Links'" />
            <textarea name="social_links" class="w-full mb-4" required></textarea>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Upload</button>
        </form>
    </div>
</x-app-layout>
