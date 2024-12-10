<?php

namespace Tests\Feature;

use App\Enums\JobAppliedStatusEnums;
use App\Models\JobApplied;
use App\Models\User;
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
        
    $response->assertStatus(200);
    $this->assertDatabaseHas('job_applied', $data);
});


// test("edit job applied status", function(){
//     // arrange
//     $jobApplied = JobApplied::factory()->count(1)->create();
//     // act
//     $jobApplied->status;

//     // assert
// });

// test("edit job applied summary", function(){
//     // arrange
//     JobApplied::factory()->count(30)->create();
//     // act
//     $response = $this->get("/");
//     // assert
//     $response->assertViewHas('jobsApplied', function ($jobsApplied) {
//         return $jobsApplied->count() === 15;
//     });
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


