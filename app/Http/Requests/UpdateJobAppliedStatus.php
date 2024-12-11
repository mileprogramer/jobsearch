<?php

namespace App\Http\Requests;

use App\Enums\JobAppliedStatusEnums;
use Illuminate\Foundation\Http\FormRequest;

class UpdateJobAppliedStatus extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "job_applied_status" => ["required", "in:" . implode(',', JobAppliedStatusEnums::values())]
        ];
    }
}
