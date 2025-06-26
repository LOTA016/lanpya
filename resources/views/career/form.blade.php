@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h2 class="text-2xl font-semibold mb-6">Career Path Questionnaire</h2>
    <form x-data="{ loading: false }" @submit="loading = true" method="POST" action="{{ route('career.analyze') }}">
        @csrf
        @foreach ($questions as $index => $question)
            <label class="block font-medium">{{ $question }}</label>
            <input type="text" name="answers[]" class="w-full p-2 rounded border mb-4" required>
        @endforeach
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>

        <!-- Loading Spinner -->
        <div x-show="loading" class="mt-4 text-gray-600">
            <svg class="animate-spin h-5 w-5 mr-2 text-blue-600 inline" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
            </svg>
            Generating suggestions...
        </div>
    </form>


</div>
@endsection

@push('scripts')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush

