<?php

test('returns a successful response', function () {
    $response = $this->get(route('home'));

    $response->assertOk();
});

test('shows a course detail page', function () {
    $this->get(route('courses.show', ['slug' => 'sustainable-cities']))
        ->assertOk();
});

test('returns not found for an unknown course', function () {
    $this->get(route('courses.show', ['slug' => 'unknown-course']))
        ->assertNotFound();
});
