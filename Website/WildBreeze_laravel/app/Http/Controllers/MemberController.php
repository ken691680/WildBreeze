<?php


namespace App\Http\Controllers;

use App\Infra\Models\Citys;
use App\Infra\Services\MemberService;
use App\Library\CommonLib;
use Illuminate\Support\Facades\Auth;

/**
 * Class MemberController
 * @package App\Http\Controllers
 */
class MemberController extends Controller
{
    private $commonLib;
    private $memberService;
    private $citys;

    public function __construct(CommonLib $commonLib, MemberService $memberService, Citys $citys)
    {
        $this->commonLib = $commonLib;
        $this->memberService = $memberService;
        $this->citys = $citys;
    }

    public function showMemberLog()
    {
        if (empty(Auth::user())) {
            return redirect(route('loginForm'));
        } else {
            $user = Auth::user();

            return view('auth.member_log', $this->commonLib->mergeCommonData([
                'data' =>  $user->only(['email', 'name', 'gender','phone', 'city', 'township' , 'address', 'new_latter']),
                'citys' => $this->memberService->showCitys(),
                'areas' => $this->citys->getArae($user->city)->toArray()
            ]));
        }
    }

}
