<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CareerTestController;
use App\Http\Controllers\MentorController;

Route::get('/', function () {
    return redirect(app()->getLocale());
});

Route::get('/home', [WelcomeController::class, 'index'])->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/career/form', [CareerTestController::class, 'showForm'])->name('career.form');
    Route::post('/career/analyze', [CareerTestController::class, 'analyze'])->name('career.analyze');
    Route::get('/career/income', [CareerTestController::class, 'compareIncome'])->name('career.income');
    Route::get('/mentors/create', [MentorController::class, 'create'])->name('mentors.create');
    Route::post('/mentors', [MentorController::class, 'store'])->name('mentors.store');
    Route::get('/mentors', [MentorController::class, 'index'])->name('mentors.index');
});

Route::view('/about', 'about')->name('about');

Route::view('/blog', 'blog.index')->name('blog.index');
Route::view('/blog/how-career-is-vital-for-youth', 'blog.how-career-is-vital-for-youth')->name('blog.how-career-is-vital-for-youth');
Route::view('/blog/top-soft-skills-for-career-success', 'blog.top-soft-skills-for-career-success')->name('blog.top-soft-skills-for-career-success');
Route::view('/blog/interview-tips-for-first-job-seekers', 'blog.interview-tips-for-first-job-seekers')->name('blog.interview-tips-for-first-job-seekers');
Route::view('/blog/podcasts-to-inspire-your-career', 'blog.podcasts-to-inspire-your-career')->name('blog.podcasts-to-inspire-your-career');
Route::view('/blog/free-online-courses-for-beginners', 'blog.free-online-courses-for-beginners')->name('blog.free-online-courses-for-beginners');

Route::view('/contact', 'contact')->name('contact');
Route::view('/podcasts', 'podcasts')->name('podcasts');
Route::view('/privacy', 'privacy')->name('privacy');

Route::get('/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'my'])) {
        abort(400);
    }

    app()->setLocale($locale);
    session(['locale' => $locale]);

    return view('welcome');
})->name('localized.welcome');


