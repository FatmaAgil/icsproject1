<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
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

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
