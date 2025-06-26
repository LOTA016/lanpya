@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-6">
    <h2 class="text-2xl font-semibold mb-4">Career Mentors</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($mentors as $mentor)
            <div class="bg-white p-6 rounded shadow hover:shadow-lg transition duration-300">
                @if($mentor->profile_photo)
                    <img src="{{ asset('storage/' . $mentor->profile_photo) }}" alt="{{ $mentor->name }}" class="w-24 h-24 rounded-full object-cover mb-4">
                @else
                    <div class="w-24 h-24 rounded-full bg-gray-200 mb-4 flex items-center justify-center text-gray-400">
                        No Image
                    </div>
                @endif
                
                <h3 class="text-xl font-bold">{{ $mentor->name }}</h3>
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

                <p class="mt-3 text-gray-700">{{ Str::limit($mentor->bio, 150) }}</p>

                <a href="{{ $mentor->social_links }}" target="_blank" class="text-blue-600 hover:underline block mt-4 font-semibold">Contact</a>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $mentors->links() }}
    </div>
</div>
@endsection

