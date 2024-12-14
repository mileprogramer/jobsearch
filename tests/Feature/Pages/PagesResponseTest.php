<?php

namespace Tests\Feature;

use App\Models\JobApplied;
use App\Models\User;

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


test('returns a successful response for edit job applied page', function () {
    $jobApplied = JobApplied::factory()->create();
    $response = $this->actingAs(User::factory()->create())
        ->get('dashboard/edit-job-applied/'. $jobApplied->id);

    $response->assertStatus(200);
});
