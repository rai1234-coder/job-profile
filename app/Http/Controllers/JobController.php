<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::where('user_id', Auth::id())->latest()->get();
        return view('employer.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('user_id', auth()->id())->get();
        $jobs = Job::where('user_id', Auth::id())->latest()->get();
        return view('employer.jobs.create', compact('categories', 'jobs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
                $request->validate([
                    'title' => 'required',
                    'company_name' => 'required',
                    'description' => 'required',
                    'type' => 'required',
                    'salary' => 'nullable',
                    'location' => 'nullable',
                    'responsibilities' => 'nullable|string',
                    'requirements' => 'nullable|string',
                    'category_id' => 'required|exists:categories,id',
        ]);

                Job::create([
                    'user_id' => Auth::id(),
                    'title' => $request->title,
                    'company_name' => $request->company_name,
                    'description' => $request->description,
                    'type' => $request->type,
                    'salary' => $request->salary,
                    'location' => $request->location,
                    'category_id' => $request->category_id,
                    'responsibilities' => $request->responsibilities,
                    'requirements' => $request->requirements,
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job posted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
        public function edit(Job $job)
        {
            // Ensure the logged-in employer owns this job
            if (auth()->id() !== $job->user_id) {
                return back()->with('error', 'You are not authorized to edit this job.');
            }

            $categories = Category::where('user_id', auth()->id())->get();

            return view('employer.jobs.edit', compact('job', 'categories'));
        }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Job $job)
{

    // dd($request->all(), $job);
    // Ensure only the owner can update the job
    if (auth()->id() !== $job->user_id) {
        return back()->with('error', 'You are not authorized to update this job.');
    }

    // Validate the request
    $request->validate([
        'title' => 'required|string|max:255',
        'company_name' => 'required|string',
        'description' => 'required|string',
        'type' => 'required|string',
        'salary' => 'nullable|numeric',
        'location' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'responsibilities' => 'required|string',
        'requirements' => 'required|string',
    ]);

    // Update the job
    $job->update([
        'title' => $request->title,
        'company_name' => $request->company_name,
        'description' => $request->description,
        'type' => $request->type,
        'salary' => $request->salary,
        'location' => $request->location,
        'category_id' => $request->category_id, // link to category
        'responsibilities' => $request->responsibilities,
        'requirements' => $request->requirements,
    ]);

    return redirect()->route('jobs.index')->with('success', 'Job updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
        public function destroy(Job $job)
        {
            // Ensure the logged-in user owns the job
            if (auth()->id() !== $job->user_id) {
                return back()->with('error', 'You are not authorized to delete this job.');
            }

            $job->delete();

            return back()->with('success', 'Job deleted successfully!');
        }

}
