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
            '1. What are your main interests and hobbies? (သင်၏ အဓိက စိတ်ဝင်စားမှုများနှင့် ဝါသနာများက ဘာတွေလဲ? )',
            
            '2. Which school subjects do you enjoy the most? (သင် အကြိုက်ဆုံး ကျောင်းဘာသာရပ်များက ဘာတွေလဲ? )',
            
            '3. Do you prefer working with people, data, or hands-on activities? (သင်က လူများနှင့်၊ ဒေတာများနှင့်၊ သို့မဟုတ် လက်တွေ့လုပ်ငန်းများနှင့် အလုပ်လုပ်ရတာ ပိုကြိုက်လား? )',
            
            '4. What type of work environment appeals to you most (office, outdoors, remote, etc.)? (ဘယ်လို အလုပ်ပတ်ဝန်းကျင်မျိုးက သင့်ကို အရမ်းဆွဲဆောင်လဲ ~ ရုံးခန်း၊ ပြင်ပ၊ အဝေးမှ အလုပ်လုပ်ခြင်း၊ စသည်? )',
            
            '5. Are you more motivated by helping others or achieving personal success? (သင်က တခြားသူများကို ကူညီခြင်းက လုပ်ဆောင်ရတာလား၊ သို့မဟုတ် ကိုယ်ပိုင် အောင်မြင်မှုရရှိရတာက ပိုစိတ်အားထက်သန်လား? )',
            
            '6. Do you enjoy leading teams or prefer working independently? (သင်က အဖွဲ့ကို ဦးဆောင်ရတာ ကြိုက်လား၊ သို့မဟုတ် တစ်ကိုယ်တော် အလုပ်လုပ်ရတာ ပိုကြိုက်လား? )',
            
            '7. What are your strongest skills or talents? (သင်၏ အင်အားရှိဆုံး ကျွမ်းကျင်မှုများ သို့မဟုတ် စွမ်းရည်များက ဘာတွေလဲ? )',
            
            '8. How important is work-life balance to you? (သင့်အတွက် အလုပ်နှင့်ဘဝ ညီမျှတာက ဘယ်လောက် အရေးကြီးလဲ? )',
            
            '9. Are you willing to pursue additional education or training for your career? (သင့်အသက်မွေးဝမ်းကြောင်းအတွက် နောက်ထပ် ပညာရေး သို့မဟုတ် လေ့ကျင့်ရေး လုပ်ဆောင်ရန် စိတ်ရှိလား? )',
            
            '10. What kind of impact do you want to make in society through your career? (သင့်အသက်မွေးဝမ်းကြောင်းမှတစ်ဆင့် လူ့အဖွဲ့အစည်းတွင် ဘယ်လို သြဇာလွှမ်းမိုးမှု ပြုလုပ်ချင်လဲ? )'
        ];

        return view('career.form', compact('questions'));
    }
   public function analyze(Request $request)
    {
        $answers = $request->input('answers');
        $language = $request->input('language', 'en');

        // Prompt for career suggestions
        $careerPrompt = match ($language) {
            'my' => "အောက်ဖော်ပြပါ အဖြေများအပေါ် မူတည်ပြီး မြန်မာနိုင်ငံ သို့မဟုတ် ထိုင်းနိုင်ငံရှိ လူငယ်တစ်ဦးအတွက် အသုံးဝင်ပြီး တကယ်ဖြစ်နိုင်သော အသက်မွေးဝမ်းကြောင်းနည်းလမ်းများ အတိုချုံးအဖြစ် အကြံပြုပါ။ ... အဖြေများ: " . json_encode($answers),
            default => "Based on the following answers... Answers: " . json_encode($answers),
        };

        $response = Gemini::generativeModel(model: 'gemini-2.0-flash')->generateContent($careerPrompt);
        $suggestions = $response->text() ?? 'No suggestions returned.';

        // Extract job titles
        $careers = collect(explode("\n", $suggestions))
            ->filter(fn($line) => preg_match('/^[0-9]+\./', $line))
            ->map(fn($line) => trim(preg_replace('/^[0-9]+\.\s*/', '', explode('(', $line)[0])))
            ->filter()
            ->values()
            ->all();

        // Save for later income comparison
        session([
            'career_suggestions_raw' => $suggestions,
            'career_titles' => $careers,
            'career_language' => $language,
        ]);

        // Get mentors
        $mentors = Mentor::query()
            ->where('language', $language)
            ->where(function ($query) use ($answers) {
                foreach ($answers as $interest) {
                    $query->orWhere('expertise', 'like', "%{$interest}%")
                        ->orWhere('industry', 'like', "%{$interest}%")
                        ->orWhere('profession', 'like', "%{$interest}%");
                }
            })
            ->take(3)
            ->get();

        return view('career.results', [
            'suggestions' => $suggestions,
            'mentors' => $mentors,
            'language' => $language,
        ]);
    }


    public function compareIncome()
    {
        $careers = session('career_titles', []);
        $language = session('career_language', 'en');

        if (empty($careers)) {
            return redirect()->route('career.form')->with('error', 'No career data found.');
        }

        $careerList = implode(', ', $careers);

        $prompt = match ($language) {
            'my' => "အောက်ပါ အလုပ်အကိုင်များအတွက် မြန်မာနှင့် ထိုင်းနိုင်ငံတို့ရှိ ပျမ်းမျှလစဉ်ဝင်ငွေကို MMK နှင့် THB ဖြင့် ရှင်းလင်းလွယ်ကူသောပုံစံဖြင့် နှိုင်းယှဉ်ပြပါ။ အလုပ်အကိုင်များ: $careerList",
            default => "Compare the average monthly income in MMK and THB for the following careers in Myanmar and Thailand: $careerList. Present in a clear list.",
        };

        $response = Gemini::generativeModel(model: 'gemini-2.0-flash')->generateContent($prompt);
        $data = $response->text() ?? 'No income data available.';

        return view('career.income', [
            'data' => $data,
            'language' => $language,
        ]);
    }

}


