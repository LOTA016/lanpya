@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-6">
    <h2 class="text-2xl font-semibold mb-4">Career Mentors</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($mentors as $mentor)
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-lg font-bold">{{ $mentor->name }}</h3>
                <p class="text-sm text-gray-700">{{ $mentor->profession }}</p>
                <p class="mt-2 text-gray-600">{{ $mentor->bio }}</p>
                <a href="{{ $mentor->social_links }}" class="text-blue-500 block mt-2">Contact</a>
            </div>
        @endforeach
    </div>
</div>
@endsection