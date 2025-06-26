<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;
use Gemini\Laravel\Facades\Gemini;

class CareerTestController extends Controller
{
    public function showForm()
    {
        $questions = [
            'What are your hobbies?',
            'What subjects do you enjoy?',
            'Do you prefer working with people or data?'
        ];

        return view('career.form', compact('questions'));
    }

    public function analyze(Request $request)
    {
        $answers = $request->input('answers');

        $prompt = "Suggest short and practical career paths suitable for Myanmar and Thailand youth with these interests: " . json_encode($answers) . ". Keep suggestions short and realistic. End every suggestion with: 'Provided by Lan Pya'";

        $response = Gemini::generativeModel(model: 'gemini-2.0-flash')
            ->generateContent($prompt);

        $suggestions = $response->text() ?? 'No suggestions returned.';
        $mentors = Mentor::query()
            ->where('language', app()->getLocale())
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('career.results', [
            'suggestions' => $suggestions,
            'mentors' => $mentors,
        ]);
    }

    public function compareIncome()
    {
        $prompt = "Compare average income of Software Engineer in Myanmar and Thailand";

        $response = Gemini::chat()->complete([
            'model' => 'gemini-2.0-flash',
            'messages' => [
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        $data = $response['choices'][0]['message']['content'] ?? 'No data from Gemini';

        return view('career.income', [
            'data' => $data,
        ]);
    }
}

