<?php

namespace App\Http\Controllers\Auth;

use App\Infra\Models\Users;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\RegisterMessage;
use App\Infra\Services\MemberService;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    private $memberService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MemberService $memberService)
    {
        $this->middleware('guest');
        $this->memberService = $memberService;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register', []);
    }

    public function registerProcess(Request $request) {

        if (!empty($this->memberService->getMember($request['email']))) {

            return response()->json([
                'code' => '400',
                'msg' => '此郵件已被註冊',
            ], 200);
        } else {

            $this->validator($request->all())->validate();

            event(new Registered($user = $this->create($request->all())));

            $this->guard()->login($user);

            Mail::to($request['email'])->send(new RegisterMessage($request));

            return response()->json([
                'code' => '200',
                'msg' => 'register success',
            ], 200);
        }
    }

    protected function create(array $data)
    {
        return Users::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' =>  $data['gender'],
        ]);
    }

}
