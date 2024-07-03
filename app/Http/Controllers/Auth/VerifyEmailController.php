<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return $this->redirectBasedOnRole($request->user());
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return $this->redirectBasedOnRole($request->user());
    }

    /**
     * Redirect the user based on their role.
     */
    protected function redirectBasedOnRole($user): RedirectResponse
    {
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
