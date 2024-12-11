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

test('can add new job applied', function () {
    // arrange
    $data = [
        "company_name" => "Firma",
        "link" => "https://nemanja-milic.rs",
    ];
    JobApplied::create($data);
    $jobApplied = JobApplied::searchByCompanyName($data["company_name"])->first();
    expect($jobApplied->company_name)->toBe($data["company_name"]);
    expect($jobApplied->link)->toBe($data["link"]);
});

test('can edit the job status applied', function () {
    // arrange
    $jobApplied = JobApplied::factory()->create();
    // act
    $jobApplied->status = JobAppliedStatusEnums::ShouldHaveHrInterview;
    $jobApplied->save();
    // expect
    $jobAppliedSaved = JobApplied::where("id", $jobApplied->id)->first();
    expect($jobApplied->status->value)->toBe(JobAppliedStatusEnums::fromValue($jobAppliedSaved->status)->value);
});

