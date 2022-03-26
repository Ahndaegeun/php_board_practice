<?php

use JetBrains\PhpStorm\Pure;

class APP_MemberService {

    private APP_MemberRepository $memberRepository;

    public function __construct()
    {
        global $App_memberRepository;
        $this->memberRepository = $App_memberRepository;
    }

    public function loginMember(string $loginId, string $loginPw): ?array
    {
        return $this->memberRepository->loginMember($loginId, $loginPw);
    }

    public function getMemberById(int $id): ?array
    {
        return $this->memberRepository->getForPrintMemberById($id);
    }

    public function secession(int $id)
    {
        $this->memberRepository->secession($id);
    }
}