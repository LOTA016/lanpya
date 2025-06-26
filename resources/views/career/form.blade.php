@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h2 class="text-2xl font-semibold mb-6">Career Path Questionnaire</h2>
    <form method="POST" action="{{ route('career.analyze') }}">
        @csrf
        @foreach ($questions as $index => $question)
            <label class="block font-medium">{{ $question }}</label>
            <input type="text" name="answers[]" class="w-full p-2 rounded border mb-4" required>
        @endforeach
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
    </form>
</div>
@endsection