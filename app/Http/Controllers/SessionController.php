<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;

class SessionController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        // validate the request
        $fields = request()->validate([
            'email'                 => ['required', 'max:255', 'email', Rule::exists('users', 'email')],
            'password'              => ['required', 'max:255', 'min:8'],
        ]);

        // attempt to authenticate the logged in user
        if (auth()->attempt($fields)) {
            // protect the user from session fixation attack
            session()->regenerate();

            // logged in successfully
            return redirect('/')->with('success', 'logged in successfully');
        }

        // there is an error
        return back()
            ->withInput()
            ->withErrors([
                'email' => 'Your email or password isn\'t correct'
            ]);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'logged out successfully');
    }
}
