<?php

namespace App\Infra\Services;

use App\Infra\Models\Member;

/**
 * Class MemberService
 * @package App\Infra\Services
 */
class MemberService
{
    private $member;

    public function __construct(Member $member)
    {
        $this->member = $member;
    }

    public function getMember($email)
    {
        return $this->member->getMemberEmail($email);
    }
}
