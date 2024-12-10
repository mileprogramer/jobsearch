<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewJobAppliedRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "company_name" => ["required", "string", "max:50"],
            "link" => ["required", "url:http,https"],
        ];
    }
}
