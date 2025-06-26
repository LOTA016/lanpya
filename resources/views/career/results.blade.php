@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h2 class="text-2xl mb-4 font-semibold">Career Suggestions</h2>
    <div class="bg-white p-4 rounded shadow">
        {!! nl2br(e($suggestions)) !!}
    </div>
</div>
@endsection