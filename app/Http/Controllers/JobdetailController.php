<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class JobdetailController extends Controller
{
        public function jobdetails($id)
    {
        $job = Job::findOrFail($id); // get a single job by ID
        return view('jobdetails', compact('job'));
    }
}
