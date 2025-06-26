@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <h2 class="text-2xl font-semibold mb-6 text-blue-700">Career Path Questionnaire</h2>

    <form x-data="careerForm()" @submit.prevent="submitForm" method="POST" action="{{ route('career.analyze') }}">
        @csrf

        <!-- Animated Question Display -->
        <div class="transition-all duration-300 ease-in-out">
            <template x-if="current < questions.length">
                <div>
                    <label class="block font-medium text-blue-600 mb-2" x-html="questions[current]"></label>
                    <input type="text"
                           x-model="answers[current]"
                           class="w-full p-3 border-2 border-blue-500 rounded-md mb-6 focus:outline-none focus:ring-2 focus:ring-blue-400"
                           required>
                </div>
            </template>
        </div>

        <!-- Navigation Buttons -->
        <div class="flex justify-between">
            <button type="button"
                    x-show="current > 0"
                    @click="current--"
                    class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
                Previous
            </button>

            <button type="button"
                    x-show="current < questions.length - 1"
                    @click="nextQuestion"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 ml-auto">
                Next
            </button>

            <button type="submit"
                    x-show="current === questions.length - 1"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 ml-auto">
                Submit
            </button>
        </div>

        <!-- Loading Spinner -->
        <div x-show="loading" class="mt-6 text-gray-600">
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
<script>
function careerForm() {
    return {
        current: 0,
        loading: false,
        questions: @json($questions),
        answers: Array(@json(count($questions))).fill(''),
        nextQuestion() {
            if (this.answers[this.current].trim() !== '') {
                this.current++;
            } else {
                alert('Please answer before proceeding.');
            }
        },
        submitForm() {
            this.loading = true;

            // Create a form and append inputs manually
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = "{{ route('career.analyze') }}";

            // Add CSRF token
            const csrf = document.createElement('input');
            csrf.type = 'hidden';
            csrf.name = '_token';
            csrf.value = '{{ csrf_token() }}';
            form.appendChild(csrf);

            // Add answers
            this.answers.forEach(answer => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'answers[]';
                input.value = answer;
                form.appendChild(input);
            });

            document.body.appendChild(form);
            form.submit();
        }
    }
}
</script>
@endpush
