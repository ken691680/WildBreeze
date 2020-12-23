<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Infra\Services\MemberService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating `user`s for the application and
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

    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MemberService $memberService)
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login',[]);
    }

    public function memberLogin(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {

            $this->sendFailedLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);

    }
}
