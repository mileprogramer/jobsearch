<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditJobAppliedRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rulesForLinkAndCompanyName = (new AddNewJobAppliedRequest())->rules();
        $ruleForTheJobStatus = (new UpdateJobAppliedStatus())->rules();
        return array_merge(
            $ruleForTheJobStatus,
            $rulesForLinkAndCompanyName,
            [
                "summary" => ["string", "min:10", "max:1000"],
            ]
        );
    }
}
