<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Mauricius\LaravelHtmx\Http\HtmxResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): HtmxResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            // return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
            return with(new HtmxResponse())->location(route('dashboard', absolute: false) . '?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        // return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
        return with(new HtmxResponse())->location(route('dashboard', absolute: false) . '?verified=1');
    }
}
