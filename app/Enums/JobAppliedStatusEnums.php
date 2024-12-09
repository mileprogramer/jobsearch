<?php

namespace App\Enums;

use App\Traits\EnumActions;

enum JobAppliedStatusEnums :string
{
    use EnumActions;

    case Applied = "Applied";
    case Successfully = "Successfully";
    case Rejection = "Rejection";
    case GenericRejection = "Generic rejection";
    case RejectionByHR = "Rejection by HR";
    case RejectionByTechnicalInterview = "Rejection by technical interview";
    case SelectedAnotherDev = "Another dev is selected";

    public static function generateBadge(string $statusValue)
    {
        if($statusValue === self::Applied->value)
        {
            return (
                "<span class='whitespace-nowrap bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300'>$statusValue</span>"
            );
        }
        elseif($statusValue === self::Successfully->value)
        {
            return (
                "<span class='whitespace-nowrap bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300'>$statusValue</span>"
            );
        }
        elseif($statusValue === self::Rejection->value)
        {
            return (
                "<span class='whitespace-nowrap bg-red-500 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300'>$statusValue</span>"
            );
        }
        elseif($statusValue === self::GenericRejection->value)
        {
            return (
                "<span class='whitespace-nowrap bg-red-800 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300'>$statusValue</span>"
            );
        }
        elseif($statusValue === self::RejectionByTechnicalInterview->value)
        {
            return (
                "<span class='whitespace-nowrap bg-red-500 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300'>$statusValue</span>"
            );
        }
        elseif($statusValue === self::RejectionByHR->value)
        {
            return (
                "<span class='whitespace-nowrap bg-red-500 text-white text-sm font-medium me-2 px-3.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300'>$statusValue</span>"
            );
        }
        elseif($statusValue === self::SelectedAnotherDev->value)
        {
            return (
                "<span class='whitespace-nowrap bg-red-500 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300'>$statusValue</span>"
            );
        }
    }

}
