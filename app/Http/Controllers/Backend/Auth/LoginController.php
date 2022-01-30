<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = route('backend.index');
        $this->middleware('guest:backend')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return Factory|Response|View
     */
    public function showLoginForm()
    {
        return view('backend.auth.login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('backend');
    }

    /**
     * The user has logged out of the application.
     *
     * @param Request $request
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        return redirect()->route('backend.login');
    }

    public function logout(Request $request)
    {
        // Get the session key for this user
        $sessionKey = $this->guard()->getName();

        $this->guard()->logout();

        // Delete single session key (just for this user)
        $request->session()->forget($sessionKey);

        return $this->loggedOut($request) ?: redirect('/backend');
    }
}
