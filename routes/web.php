<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mauricius\LaravelHtmx\Http\HtmxResponseClientRefresh;

Route::post('/locale', function () {
    // Validate
    $validated = request()->validate([
        'language' => 'required|string|in:en,id',
    ]);
    // Put Locale into Session
    session()->put('locale', $validated['language']);
    // Response for force reload the locale
    // return new HtmxResponseClientRefresh();
    return redirect()->back();
})->name('set.language');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('blog', BlogController::class);
Route::resource('contacts', ContactController::class);


require __DIR__ . '/auth.php';
