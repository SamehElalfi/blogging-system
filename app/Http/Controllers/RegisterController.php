<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $fields = request()->validate([
            'name'                  => ['required', 'max:255'],
            'username'              => ['required', 'max:255', 'min:3', Rule::unique('users', 'username')],
            'email'                 => ['required', 'max:255', 'email', Rule::unique('users', 'email')],
            'password'              => ['required', 'max:255', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'max:255']
        ]);

        User::create($fields);

        return redirect('/')->with('success', 'Your account has been created successfully');
    }
}
