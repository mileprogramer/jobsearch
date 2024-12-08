<?php

namespace Tests\Feature;

use App\Models\JobApplied;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test("list 15 jobs per page", function(){
    // arrange
    JobApplied::factory()->count(30)->create();
    // act
    $response = $this->get("/");
    // assert
    $response->assertViewHas('jobsApplied', function ($jobsApplied) {
        return $jobsApplied->count() === 15;
    });
});

