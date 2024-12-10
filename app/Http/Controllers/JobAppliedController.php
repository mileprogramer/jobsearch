<?php

namespace App\Http\Controllers;

use App\Enums\JobAppliedStatusEnums;
use App\Models\JobApplied;
use Illuminate\Http\Request;

class JobAppliedController extends Controller
{
    public function index()
    {
        $jobsApplied = JobApplied::paginate();
        $jobsAppliedEnumsStatus = JobAppliedStatusEnums::cases();
        return view("home", [
            "jobsApplied" => $jobsApplied,
            "jobsAppliedEnumsStatus" => $jobsAppliedEnumsStatus
        ]);
    }

    public function search(Request $request)
    {
        if(!$request->query("term"))
            abort(404);

        $searchedJobsApplied = JobApplied::searchByCompanyName($request->query("term"))->paginate();
        $jobsAppliedEnumsStatus = JobAppliedStatusEnums::cases();
        return view("home", [
            "searchTerm" => $request->query("term"),
            "jobsApplied" => $searchedJobsApplied,
            "jobsAppliedEnumsStatus" => $jobsAppliedEnumsStatus
        ]);
    }

    public function filter(Request $request)
    {
        if(!$request->query("job_status") || array_key_exists($request->query("job_status"), JobAppliedStatusEnums::values()))
            abort(404);

        $jobsAppliedEnumsStatus = JobAppliedStatusEnums::cases();
        $filterJobsApplied = JobApplied::filterByStatus(JobAppliedStatusEnums::fromValue($request->query    ("job_status")))->paginate();
        return view("home", [
            "selectedFilter" => $request->query("job_status"),
            "jobsApplied" => $filterJobsApplied,
            "jobsAppliedEnumsStatus" => $jobsAppliedEnumsStatus
        ]);
    }
}
