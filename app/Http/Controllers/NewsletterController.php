<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Exception;
use App\Services\Newsletter;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter) {
        request()->validate(['email' => 'required|email']);
        
        try {
            $newsletter->subscribe(request('email'));
        } catch(Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list.'
            ]);
        }

        return redirect('/')
        ->with('success', 'You are now signed up for our newsletter!');
    }
}
