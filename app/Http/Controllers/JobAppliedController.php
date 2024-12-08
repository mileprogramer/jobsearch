<?php

namespace App\Http\Controllers;

use App\Models\JobApplied;
use Illuminate\Http\Request;

class JobAppliedController extends Controller
{
    public function index()
    {
        $jobsApplied = JobApplied::paginate();
        return view("home", ["jobsApplied" => $jobsApplied]);
    }
}
