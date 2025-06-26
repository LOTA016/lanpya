<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CareerTestController;

Route::get('/', function () {
    return redirect(app()->getLocale());
});

Route::get('/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'my'])) {
        abort(400);
    }

    app()->setLocale($locale);
    session(['locale' => $locale]);

    return view('welcome');
})->name('localized.welcome');

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
});