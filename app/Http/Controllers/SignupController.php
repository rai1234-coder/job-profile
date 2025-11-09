<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class SignupController extends Controller
{
            public function signup()
    {
       return view('signup');
    }

    public function signupUser(Request $request){
      // dd($request->all());

      $validated = $request->validate([
         'fname' => 'required|string|max:255',
         'email' => 'required|lowercase|email|unique:users,email',
         'password' => ['required', 'confirmed', Password::defaults()],
         'role' => 'required|in:employer,job_seeker',
      ]);

      $user = User::create([
        'name' => $validated['fname'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']), // Always hash passwords!
        'role' => $validated['role'],
      ]);

      Auth::login($user);

      if($user->role == 'employer'){
         return redirect()->route('employer.dashboard');
      }

      // job seeker
      return redirect()->route('home.view');
    }
}
