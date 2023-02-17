<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        // validate subscriber email address
        request()->validate(['email' => ['required', 'email']]);

        try {
            // add a new subscriber to our newsletter
            $newsletter->subscribe(request('email'));
        } catch (\Exception $e) {
            ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list.'
            ]);
        }

        return redirect('/')
            ->with('success', 'You now are signed up for our newsletter!');
    }
}
