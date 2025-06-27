@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-12 px-6 text-gray-800">
    <!-- Intro Section -->
    <div class="mb-10 text-center animate__animated animate__fadeInDown">
        <h2 class="text-3xl font-bold text-blue-600 mb-4">Meet Our Lan Pya Mentors</h2>
        <p class="text-lg text-gray-600 leading-relaxed max-w-3xl mx-auto">
            At <strong>Lan Pya</strong>, our mission is to guide and inspire youth in Myanmar and Thailand
            to explore meaningful career paths. These mentors are experienced professionals from diverse
            industries — volunteering to offer advice, motivation, and real-world insights. Whether you're just
            beginning your journey or navigating a pivot, there's a mentor here for you.
        </p>
    </div>

    <!-- Mentor Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($mentors as $mentor)
            <div class="relative group bg-white p-6 rounded-xl shadow-lg transition-transform transform hover:-translate-y-1 animate__animated animate__fadeInUp" style="transition-delay: {{ $loop->index * 0.2 }}s">
                @if($mentor->profile_photo)
                    <img src="{{ asset('storage/' . $mentor->profile_photo) }}" alt="{{ $mentor->name }}" class="w-24 h-24 rounded-full object-cover mb-4 border-2 border-blue-500">
                @else
                    <div class="w-24 h-24 rounded-full bg-gray-200 mb-4 flex items-center justify-center text-gray-400 text-sm">
                        No Image
                    </div>
                @endif

                <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-blue-600 opacity-0 group-hover:opacity-75 transition-opacity duration-2000 flex items-center justify-center text-white">
                    <p class="text-lg font-semibold">{{ $mentor->name }}</p>
                </div>

                <h3 class="text-xl font-bold text-blue-600">{{ $mentor->name }}</h3>
                <p class="text-sm text-gray-700 italic">{{ $mentor->profession }} @if($mentor->industry) | {{ $mentor->industry }} @endif</p>

                @if($mentor->experience_level)
                    <p class="text-sm text-gray-600 mt-1"><strong>Experience:</strong> {{ $mentor->experience_level }}</p>
                @endif

                @if($mentor->location)
                    <p class="text-sm text-gray-600"><strong>Location:</strong> {{ $mentor->location }}</p>
                @endif

                @if($mentor->availability)
                    <p class="text-sm text-gray-600"><strong>Availability:</strong> {{ $mentor->availability }}</p>
                @endif

                @if($mentor->expertise)
                    <p class="text-sm text-gray-600 mt-2"><strong>Expertise:</strong> {{ $mentor->expertise }}</p>
                @endif

                <p class="mt-3 text-gray-700 text-sm leading-relaxed">{{ Str::limit($mentor->bio, 150) }}</p>

                <a href="{{ $mentor->social_links }}" target="_blank" class="text-blue-600 hover:underline block mt-4 font-semibold transition-colors duration-300 hover:text-blue-800">
                    Contact
                </a>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-10">
        {{ $mentors->links() }}
    </div>
</div>
@endsection
