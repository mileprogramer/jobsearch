<?php

namespace Tests\Feature;

use App\Enums\JobAppliedEnums;
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

test('can filter jobs by status', function () {
    // arrange
    $status = JobAppliedEnums::cases();
    JobApplied::factory()->count(5)->create(["status" => $status[0]->value]);
    JobApplied::factory()->count(5)->create(["status" => $status[1]->value]);
    // act
    $jobsApplied = JobApplied::filterByStatus($status[0])
        ->paginate();
    // assert
    $jobsApplied->each(function($jobApplied) use($status) {
        expect($jobApplied->status)->toBe($status[0]->value);
    });

});
