<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;

class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     */
    public function show(): Response
    {
        return Inertia::render('Auth/ConfirmPassword');
    }

    /**
     * Confirm the user's password.
     */
    public function store(Request $request): RedirectResponse
    {
        if (! Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());
         // Get the authenticated user
         $user = Auth::user();


         if ($user->role == 'admin') {
             return redirect()->intended(route('admin'));
         } elseif ($user->role == 'plastic user') {
             return redirect()->intended(route('dashboard'));
         } elseif ($user->role == 'recycling organization') {
             return redirect()->intended(route('landingRecycler'));
         }


     return redirect()->intended(route('/'));

        }
}
