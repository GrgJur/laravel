<?php

namespace App\Http\Controllers\admin;

use App\Models\School;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Str;

class AuthenticationController extends Controller
{
    public function show() {
        $infos = $this->getStartSchool();
        session()->put('school', $infos[0]['id']);
        session()->put('school_name', $infos[0]['name']);
        return view('admin.authentication.login');
    }

    public function getStartSchool(){
        $schools = School::select('id', 'name')
            ->where('id', 1)
            ->get();

        return $schools; 
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param Request $request
     * @return mixed
     * @throws ValidationException
     */
    public function store(Request $request){

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if (!Auth::guard('instructor')->attempt($request->only('email', 'password'), $request->get('remember'))) {
            //RateLimiter::hit($throttleKey);

            throw ValidationException::withMessages([
                'message' => __('auth.failed'),
            ]);
        }

        //RateLimiter::clear($throttleKey);

        $request->session()->regenerate();

        return response()->json([
            'user' => Auth::guard('instructor')->user()
        ]);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request){
        Auth::guard('instructor')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $this->show();
    }
}
