<?php

namespace App\Http\Controllers;

use App\Enums\JobAppliedStatusEnums;
use App\Http\Requests\AddNewJobAppliedRequest;
use App\Http\Requests\EditJobAppliedRequest;
use App\Http\Requests\UpdateJobAppliedStatus;
use App\Models\JobApplied;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

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

    public function store(AddNewJobAppliedRequest $request)
    {
        $data = $request->validated();
        JobApplied::create($data);

        return redirect()->route('dashboard')->with('addedNewJobMsg', 'Successfully added new job applied', "activeCurrentTab", "addNewJob");
    }

    public function editStatus(JobApplied $jobApplied, UpdateJobAppliedStatus $request)
    {
        $data = $request->validated();
        $jobApplied->status = JobAppliedStatusEnums::fromValue($data['job_applied_status']);
        $jobApplied->save();

        return redirect()->route('dashboard')
            ->with('updateJobAppliedStatus', 'Successfully updated job applied status')
            ->with('activeCurrentTab', 'editJobs');
    }

    public function update(JobApplied $jobApplied, )
    {
        if(!$jobApplied)
            abort(404);

        $jobsAppliedEnumsStatus = JobAppliedStatusEnums::cases();

        return view("edit-job-applied", compact("jobApplied", "jobsAppliedEnumsStatus"));
    }

    public function edit(JobApplied $jobApplied, EditJobAppliedRequest $request)
    {
        try {
            $data = $request->validated();

            $jobApplied->update([
                "status" => JobAppliedStatusEnums::fromValue($data["job_applied_status"]),
                "link" => $data["link"],
                "summary" => $data["summary"] ?? null,
                "company_name" => $data["company_name"],
            ]);

            return redirect()->route("dashboard")
                ->with('updateJobAppliedStatus', 'Successfully updated job applied status')
                ->with('activeCurrentTab', 'editJobs');
        } catch (\Exception $e) {
            // Handle failure and go back to the previous page
            return redirect()->back()
                ->withInput($request->all()) // Preserve input data
                ->withErrors(['error' => "Failed to update job applied. Please try again. <br>$e"]);
        }
    }

    public function dashboard()
    {
        $jobsApplied = JobApplied::paginate();
        $jobsAppliedEnumsStatus = JobAppliedStatusEnums::cases();
        return view("dashboard", [
            "jobsApplied" => $jobsApplied,
            "jobsAppliedEnumsStatus" => $jobsAppliedEnumsStatus
        ]);
    }

}
