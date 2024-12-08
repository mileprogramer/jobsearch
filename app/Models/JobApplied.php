<?php

namespace App\Models;

use App\Enums\JobAppliedEnums;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplied extends Model
{
    use HasFactory;
    protected $table = "job_applied";

    public function scopeFilterByStatus(Builder $query, JobAppliedEnums $status) :Builder
    {
        return $query->where("status", $status->value);
    }

}
