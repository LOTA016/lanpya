@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-6">
    <h2 class="text-2xl font-semibold mb-4">Career Podcasts</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach ($podcasts as $podcast)
            <div class="bg-white p-4 rounded shadow">
                <h3 class="font-bold text-lg">{{ $podcast->title }}</h3>
                <p class="text-gray-700">{{ $podcast->description }}</p>
                <iframe width="100%" height="215" src="{{ $podcast->youtube_link }}" frameborder="0" allowfullscreen></iframe>
            </div>
        @endforeach
    </div>
</div>
@endsection