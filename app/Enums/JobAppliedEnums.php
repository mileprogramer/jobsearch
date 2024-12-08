<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum JobAppliedEnums :string
{
    use EnumToArray;

    case Applied = "Applied";
    case Successfully = "Successfully";
    case Rejection = "Rejection";
    case GenericRejection = "Generic rejection";
    case RejectionByHR = "Rejection by HR";
    case RejectionByTechnicalInterview = "Rejection by technical interview";
    case SelectedAnotherDev = "Another dev is selected";
}
