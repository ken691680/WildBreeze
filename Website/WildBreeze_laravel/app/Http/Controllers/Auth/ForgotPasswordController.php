<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Infra\Services\MemberService;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    private $memberServiece;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MemberService $memberService)
    {
        $this->middleware('guest');
        $this->memberServiece = $memberService;
    }

    public function showLinkRequestForm()
    {
        return view('auth.password.forget_password', []);
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.

        if (empty($this->memberServiece->getMember($request['email']))) {
            return
                response()->json([
                    'code' => 400,
                    'msg' => '無此帳號，請重新輸入',
                ], 200);
        } else {
            $response = $this->broker()->sendResetLink(
                $this->credentials($request));
            return
                response()->json([
                    'code' => 200,
                    'msg' =>'已寄送重置密碼信件',
                ], 200);
        }

    }

}
