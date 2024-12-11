<?php

namespace App\Enums;

use App\Traits\EnumActions;

enum JobAppliedStatusEnums :string
{
    use EnumActions;

    case Applied = "Applied";
    case ShouldHaveTechnicalInterview = "I should have technical interview";
    case HadTechnicalInterview = "I had technical interview";
    case ShouldHaveHrInterview = "I should have HR interview";
    case HadHrInterview = "I had HR interview";
    case Successfully = "Successfully";
    case Rejection = "Rejection";
    case GenericRejection = "Generic rejection";
    case RejectionByHR = "Rejection by HR";
    case RejectionByTechnicalInterview = "Rejection by technical interview";
    case SelectedAnotherDev = "Another dev is selected";

    public static function generateBadge(string $statusValue)
    {
        $statusClasses = [
            self::Applied->value => "bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300",
            self::Successfully->value => "bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300",
            self::Rejection->value => "bg-red-500 text-white dark:bg-red-900 dark:text-red-300",
            self::GenericRejection->value => "bg-red-800 text-white dark:bg-red-900 dark:text-red-300",
            self::RejectionByTechnicalInterview->value => "bg-red-500 text-white dark:bg-red-900 dark:text-red-300",
            self::RejectionByHR->value => "bg-red-500 text-white dark:bg-red-900 dark:text-red-300 px-3.5", // Added extra padding for this case
            self::SelectedAnotherDev->value => "bg-red-500 text-white dark:bg-red-900 dark:text-red-300",
        ];

        $defaultClasses = "whitespace-nowrap text-sm font-medium me-2 px-2.5 py-0.5 rounded";
        $classes = $statusClasses[$statusValue] ?? '';

        return "<span class='$defaultClasses $classes'>$statusValue</span>";
    }

}
