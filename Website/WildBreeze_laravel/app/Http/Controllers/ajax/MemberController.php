<?php
namespace App\Http\Controllers\ajax;

use App\Http\Controllers\Controller;
use App\Infra\Models\Citys;
use App\Infra\Models\Member;
use App\Infra\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * Class MemberController
 * @package App\Http\ajax\Controllers
 */
class MemberController extends Controller
{
    private $citys;
    private $user;

    public function __construct(Citys $citys, Users $user)
    {
        $this->citys = $citys;
        $this->user = $user;
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string'],
            'phone' => ['max:20'],
            'city' => ['string', 'max:100'],
            'township' => ['string', 'max:100'],
            'address' => ['string', 'max:100'],
            'new_latter' => ['string', 'max:20'],
            'password' => ['string', 'min:8', 'confirmed'],
        ]);
    }

    public function showArea(Request $request)
    {
        // 取得city
        $city = $request['city'];

        //  get area by city
        $areas = $this->citys->getArae($city)->toArray();

        // output data

        return response()->json([
            'code' => 200,
            'data' => $areas,
        ], 200);
    }

    public function memberDataModify(Request $request)
    {
        $userId = Auth::user()->id;

        if (!empty($request)) {

            $this->validator($request->all())->validate();

            $memberData = [
                "name" => $request['name'],
                'gender' => $request['gender'],
                'phone' => $request['phone'],
                'city' => $request['city'],
                'township' => $request['township'],
                'address' => $request['address'],
                'new_latter' => $request['new_latter']
            ];

            if (!empty($request['password'])) {
                $memberData['password'] = $request['password'];
            }

            $this->user->memberDataUpdate($userId, $memberData);

            return response()->json([
                'code' => '200',
                'msg' => '修改成功',
            ], 200);
        }

        return response()->json([
            'code' => '400',
            'msg' => '修改error',
        ], 200);
    }
}
