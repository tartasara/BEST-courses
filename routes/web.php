<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'courses' => array_values(Config::get('courses')),
    ]);
})->name('home');

Route::get('/courses/{slug}', function (string $slug) {
    $course = collect(Config::get('courses'))->firstWhere('slug', $slug);

    abort_if($course === null, 404);

    return Inertia::render('CourseDetail', [
        'course' => $course,
    ]);
})->name('courses.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
