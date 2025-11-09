<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
        public function login()
    {
       return view('login');
    }

    public function loginUser(Request $request)
    {
        // dd($request->all());

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

            if (Auth::attempt($validated, $request->boolean('remember'))) {
                $request->session()->regenerate();

                $user = Auth::user();

                if ($user->role === 'employer') {
                    return redirect()->route('employer.dashboard');
                }

                return redirect()->route('home.view');
    }

    return back()->withErrors([
        'email' => 'Invalid credentials.',
    ]);
    }
}
