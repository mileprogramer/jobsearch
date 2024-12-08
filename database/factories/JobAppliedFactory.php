<?php

namespace Database\Factories;

use App\Enums\JobAppliedEnums;
use App\Models\JobApplied;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobAppliedFactory extends Factory
{
    protected $model = JobApplied::class;
    public function definition(): array
    {
        $jobAppliedStatus = JobAppliedEnums::values();
        return [
            "company_name" => fake()->company,
            "link" => fake()->url(),
            "summary" => fake()->text,
            "status" => fake()->randomElement($jobAppliedStatus),
        ];
    }
}
