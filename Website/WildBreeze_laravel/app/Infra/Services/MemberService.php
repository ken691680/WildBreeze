<?php

namespace App\Infra\Services;



use App\Infra\Models\Users;

/**
 * Class MemberService
 * @package App\Infra\Services
 */
class MemberService
{
    private $users;

    public function __construct(Users $users)
    {
        $this->users = $users;
    }

    public function getMember($email)
    {
        return $this->users->getIdByEmail($email);
    }
}
