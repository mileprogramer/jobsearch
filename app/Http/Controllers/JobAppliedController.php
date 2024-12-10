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
}
