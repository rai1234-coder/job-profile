<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        // Get jobs created by the logged-in user
        $jobs = Job::where('user_id', Auth::id())->latest()->take(6)->get();
        $categories = Category::withCount('jobs')->latest()->take(6)->get();
       return view('index', compact('jobs', 'categories'));
    }
}
