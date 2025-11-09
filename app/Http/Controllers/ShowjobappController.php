<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobApplication;

class ShowjobappController extends Controller
{
    public function jobapp()
    {
            $applications = JobApplication::whereHas('job', function($q){
        $q->where('user_id', auth()->id());
    })->latest()->paginate(10);

    return view('employer.jobseeker', compact('applications'));
    }
}
