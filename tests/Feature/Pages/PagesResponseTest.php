<?php

namespace Tests\Feature;

test('returns a successful response for home page', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('returns a successful response for search page', function () {
    $searchTerm = "nesto";
    $response = $this->get('/search?term='.$searchTerm);

    $response->assertStatus(200);
});

test('returns a successful response for filter page', function () {
    $response = $this->get('/filter?job_status=Applied');

    $response->assertStatus(200);
});

