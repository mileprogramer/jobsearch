<?php

namespace App\Models;

use App\Casts\JobAppliedStatusCast;
use App\Enums\JobAppliedStatusEnums;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplied extends Model
{
    use HasFactory;

    protected $table = "job_applied";

    protected function casts(): array
    {
        return [
            'status' => JobAppliedStatusCast::class,
        ];
    }

    public function scopeFilterByStatus(Builder $query, JobAppliedStatusEnums $status) :Builder
    {
        return $query->where("status", $status->name);
    }

    public function scopeSearchByCompanyName(Builder $query, string $companyName) :Builder
    {
        return $query->where("company_name", $companyName);
    }

}
