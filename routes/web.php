<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AllJobController;
use App\Http\Controllers\JobdetailController;
use App\Http\Controllers\JobapplyController;
use App\Http\Controllers\ShowjobappController;
use App\Http\Controllers\Employer\CategoryController;
use Illuminate\Support\Facades\Auth;

Route::prefix('employer')->group(function () {
    Route::get('dashboard', function () {
        // Check if the user is logged in and is an employer
        if (!Auth::check() || Auth::user()->role !== 'employer') {
            return redirect('login'); // redirect to home if not authorized
        }

        return view('employer.dashboard');
    })->name('employer.dashboard');
    Route::resource('jobs', JobController::class);
    Route::resource('category', CategoryController::class);
    Route::get('/jobapplications', [ShowjobappController::class, 'jobapp'])->name('job.application');
});

Route::get('/', [HomeController::class, 'index'])->name('home.view');
Route::get('/login', [LoginController::class, 'login'])->name('login.view');
Route::get('/signup', [SignupController::class, 'signup'])->name('signup.view');
Route::get('/alljobs', [AllJobController::class, 'showalljob'])->name('alljobs.show');
Route::get('/jobdetails/{id}', [JobdetailController::class, 'jobdetails'])->name('job.details');


Route::post('/signup', [SignupController::class, 'signupUser'])->name('signup.user');
Route::post('/login', [LoginController::class, 'loginUser'])->name('login.user');
Route::post('/jobs/{job}/apply', [JobapplyController::class, 'applyjob'])->name('job.apply')->middleware('auth');