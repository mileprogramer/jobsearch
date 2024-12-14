<?php

namespace Tests\Feature;

use App\Casts\JobAppliedStatusCast;
use App\Enums\JobAppliedStatusEnums;
use App\Models\JobApplied;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

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

test('admin user can add new job applied', function () {
    $adminUser = User::factory()->create(); // Create an admin user
    $data = [
        "company_name" => "firma",
        "link" => "https://flowbite.com/docs/components/alerts/",
    ];

    // Act
    $response = $this
        ->actingAs($adminUser)
        ->post('/add-job-applied', $data);

    $response->assertStatus(302);
    $this->assertDatabaseHas('job_applied', $data);
});

test("edit job applied status", function () {

    $adminUser = User::factory()->create();
    $jobApplied = JobApplied::factory()->create();
    $data = [
        "job_applied_status" => JobAppliedStatusEnums::Rejection->value
    ];

    // Act
    $response = $this
        ->actingAs($adminUser)
        ->post('/edit-job-applied-status/'.$jobApplied->id , $data);

    $response->assertStatus(302);
    expect(JobApplied::where("id", $jobApplied->id)->first()->status)
        ->toBe(JobAppliedStatusEnums::Rejection->value);
});

// test("edit job applied summary", function(){

//     // visit the dashboard
//     // click on the button with text edit summary
//     // modal must show
//     // modal must have the input with the name summary
//     // on the button press i have to edit the summary

//     $adminUser = User::factory()->create();
//     $jobApplied = JobApplied::factory()->create();

// });

// test("try to edit something else except summary and status", function(){
//     // arrange
//     JobApplied::factory()->count(30)->create();
//     // act
//     $response = $this->get("/");
//     // assert
//     $response->assertViewHas('jobsApplied', function ($jobsApplied) {
//         return $jobsApplied->count() === 15;
//     });
// });


