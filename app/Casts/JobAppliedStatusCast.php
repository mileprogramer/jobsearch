<?php

namespace App\Casts;

use App\Enums\JobAppliedStatusEnums;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class JobAppliedStatusCast implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): ?string
    {
        return $value !== null ? JobAppliedStatusEnums::fromName($value)->value : null;
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): string
    {
        // when i do not set the value for the status(for the initial making the applied job)
        if ($value === null) {
            return null;
        }

        if($value instanceof JobAppliedStatusEnums)
        {
            return $value->name;
        }
        throw new InvalidArgumentException("Invalid status: $value");
    }
}
