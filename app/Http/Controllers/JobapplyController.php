<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;

class JobapplyController extends Controller
{
    public function applyjob(Request $request, Job $job)
    {
        // dd($request->all());
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'message' => 'nullable|string',
    ]);

        $resumePath = null;
    if ($request->hasFile('resume')) {
        $resumePath = $request->file('resume')->store('resumes', 'public');
    }

        JobApplication::create([
        'job_id' => $job->id,
        'user_id' => auth()->id(),
        'name' => $request->name,
        'email' => $request->email,
        'resume' => $resumePath,
        'message' => $request->message,
    ]);

    return back()->with('success', 'Your application has been submitted successfully!');

    }
}
