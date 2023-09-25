<?php

namespace App\Http\Controllers\Auth;

use App\Events\RealTimeMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthenticatedSessionController extends Controller
{

    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function showStudentLoginForm(){
        return view('student.login');
    }

    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        User::where('id' , Auth::user()->id)->update(['is_online' => true]);
        event( new Registered($user = Auth::user()));
      //  event(new RealTimeMessage(Auth::user()->first_name.' '.Auth::user()->last_name , Auth::user()->avatar));
        Log::info(User::where('id' , Auth::user()->id)->count());
       // Log::info(json_encode($user));
        Log::info('student here');
        return  redirect()->route('student.dashboard');
        //return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Log::info('logout');
      $user = Auth::user();
    $user->is_online = 0;
       $user->save();
     Auth::guard('web')->logout();

        $request->session()->invalidate();
      $request->session()->regenerateToken();
     return  redirect()->route('student.login');
    }
}
