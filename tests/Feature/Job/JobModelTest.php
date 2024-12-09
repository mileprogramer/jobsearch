<?php

use App\Enums\JobAppliedStatusEnums;
use App\Models\JobApplied;

test('can filter jobs by status', function () {
    // arrange
    $status = JobAppliedStatusEnums::cases();
    JobApplied::factory()->count(5)->create(["status" => $status[0]]);
    JobApplied::factory()->count(5)->create(["status" => $status[1]]);
    // act
    $jobsApplied = JobApplied::filterByStatus($status[0])
        ->paginate();
    // assert
    $jobsApplied->each(function($jobApplied) use($status) {
        expect($jobApplied->status)->toBe($status[0]->name);
    });
});

test('can search jobs applied by company name', function () {
    // arrange
    $companyName = "firmetina";
    JobApplied::factory()->count(5)->create();
    JobApplied::factory()->count(1)->create(["company_name"=> $companyName]);
    // act
    $searchJobsApplied = JobApplied::searchByCompanyName($companyName)->first();
    // assert
    expect($searchJobsApplied->company_name)->toBe($companyName);

});
