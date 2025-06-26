<?php

namespace App\Http\Controllers;

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

        $prompt = "Suggest top career paths for a person with these interests: " . json_encode($answers);

        // Use the chat completion method, with messages array and model name:
        $response = Gemini::chat()->complete([
            'model' => 'gemini-1', // replace with your actual model if different
            'messages' => [
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        // Extract the content text from the response structure:
        $suggestions = $response['choices'][0]['message']['content'] ?? 'No response from Gemini';

        return view('career.results', [
            'suggestions' => $suggestions,
        ]);
    }

    public function compareIncome()
    {
        $prompt = "Compare average income of Software Engineer in Myanmar and Thailand";

        $response = Gemini::chat()->complete([
            'model' => 'gemini-1',
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
