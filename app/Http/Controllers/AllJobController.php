<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Paginate;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Category;

class AllJobController extends Controller
{
    public function showalljob(Request $request)
    {
            $query = Job::query();

    // ===== Filters =====
    if ($request->filled('keyword')) {
        $query->where('title', 'like', '%' . $request->keyword . '%');
    }
    if ($request->filled('location')) {
        $query->where('location', $request->location);
    }
    if ($request->filled('type')) {
        $query->where('type', $request->type);
    }
    // Filter by category
    if ($request->filled('category_id')) {
        $query->where('category_id', $request->category_id);
    }
        // $jobs = Job::where('user_id', Auth::id())->latest()->paginate(6);
         $jobs = $query->latest()->paginate(6);

        // 🔹 Get distinct locations and categories for filters
    $locations = Job::select('location')->distinct()->whereNotNull('location')->pluck('location');
$categories = Category::whereHas('jobs') // only categories with jobs
                      ->withCount('jobs') // optional: count of jobs
                      ->get();


        return view('all_jobs', compact('jobs', 'locations', 'categories'));
    }
}
