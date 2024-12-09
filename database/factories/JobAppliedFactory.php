<?php

namespace Database\Factories;

use App\Enums\JobAppliedStatusEnums;
use App\Models\JobApplied;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobAppliedFactory extends Factory
{
    protected $model = JobApplied::class;
    
    public function definition(): array
    {
        $jobAppliedStatus = JobAppliedStatusEnums::cases();
        return [
            "company_name" => fake()->company,
            "link" => fake()->url(),
            "summary" => fake()->text,
            "status" => fake()->randomElement($jobAppliedStatus),
        ];
    }
}
