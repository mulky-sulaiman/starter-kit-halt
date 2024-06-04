<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Mauricius\LaravelHtmx\Http\HtmxResponse;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): HtmxResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            // return redirect()->intended(route('dashboard', absolute: false));
            return with(new HtmxResponse())->location(route('dashboard', absolute: false));
        }

        $request->user()->sendEmailVerificationNotification();

        //return back()->with('status', 'verification-link-sent');
        session()->flash('status', 'verification-link-sent');
        return back()->with(new HtmxResponse())->location(route('password.request', absolute: false));
    }
}
