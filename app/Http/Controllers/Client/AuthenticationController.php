<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Str;

class AuthenticationController extends Controller
{
    public function show() {
        return view('client.login');
    }

    public function homepage(){
        return view('client.home');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param Request $request
     * @return mixed
     * @throws ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if (!Auth::guard('member')->attempt($request->only('email', 'password'), $request->get('remember'))) {
            //RateLimiter::hit($throttleKey);

            throw ValidationException::withMessages([
                'message' => __('auth.failed'),
            ]);
        }

        //RateLimiter::clear($throttleKey);

        $request->session()->regenerate();

        return response()->json([
            'user' => Auth::guard('member')->user()
        ]);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('member')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $this->show();
    }

}
