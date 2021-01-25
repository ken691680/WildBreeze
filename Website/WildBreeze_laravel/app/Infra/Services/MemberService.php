<?php

namespace App\Infra\Services;

use App\Infra\Models\Citys;
use App\Infra\Models\Users;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

/**
 * Class MemberService
 * @package App\Infra\Services
 */
class MemberService
{
    private $users;
    private $citys;

    public function __construct(Users $users, Citys $citys)
    {
        $this->users = $users;
        $this->citys = $citys;
    }

    public function getMember($email)
    {
        return $this->users->getIdByEmail($email);
    }

    public function showCitys()
    {
        $citys = [];
        $city = $this->citys->getCity();
        $citys = $city->map(function ($city){
            return $city['ci01'];
        })->toArray();

        return $citys;
    }
}
