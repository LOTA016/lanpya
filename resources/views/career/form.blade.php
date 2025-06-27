@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h2 class="text-2xl font-semibold mb-6 animate__animated animate__fadeInDown">Career Path Questionnaires</h2>
    <form x-data="{ loading: false }" @submit="loading = true" method="POST" action="{{ route('career.analyze') }}" class="space-y-4">
        @csrf
        @foreach ($questions as $index => $question)
            <div class="animate__animated animate__fadeInUp">
                <label class="block font-medium mb-2">{{ $question }}</label>
                <input type="text" name="answers[]" class="w-full p-2 rounded border mb-4 shadow-md" required>
            </div>
        @endforeach
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded animate__animated animate__fadeInUp">Submit</button>

        <!-- Loading Spinner -->
        <div x-show="loading" class="flex items-center justify-center mt-4 text-gray-600">
            <svg class="animate-spin h-5 w-5 mr-2 text-blue-600" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
            </svg>
            <span class="animate__animated animate__fadeIn">Generating suggestions...</span>
        </div>
    </form>
</div>

@endsection

@push('scripts')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
